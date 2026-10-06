<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\VendorApplicationResource\Pages;
use App\Filament\Admin\Resources\VendorApplicationResource\RelationManagers;
use App\Models\VendorApplication;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VendorApplicationResource extends Resource
{
    protected static ?string $model = \App\Models\User::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationGroup = 'Kullanıcı Yönetimi';
    protected static ?string $navigationLabel = 'Satıcı Başvuruları';
    protected static ?string $pluralModelLabel = 'Satıcı Başvuruları';
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('vendor_status', 'pending');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->disabled(),
                Forms\Components\TextInput::make('email')->disabled(),
                Forms\Components\TextInput::make('shop_name')->label('Dükkan Adı')->disabled(),
                Forms\Components\TextInput::make('tax_number')->label('Vergi No')->disabled(),
                Forms\Components\TextInput::make('tax_office')->label('Vergi Dairesi')->disabled(),
                Forms\Components\Textarea::make('company_address')->label('Adres')->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Kullanıcı Adı'),
                Tables\Columns\TextColumn::make('shop_name')->label('Dükkan Adı'),
                Tables\Columns\TextColumn::make('tax_number')->label('Vergi No'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Başvuru Tarihi'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('approve')
                    ->label('Onayla')
                    ->color('success')
                    ->icon('heroicon-o-check')
                    ->requiresConfirmation()
                    ->action(function (\App\Models\User $record) {
                        $record->update([
                            'vendor_status' => 'approved',
                            'is_vendor' => true,
                        ]);
                        
                        // İlgili vendor kaydını da güncelle
                        \App\Models\Vendor::where('user_id', $record->id)->update([
                            'status' => 'approved',
                            'is_active' => true,
                        ]);
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVendorApplications::route('/'),
            'create' => Pages\CreateVendorApplication::route('/create'),
            'edit' => Pages\EditVendorApplication::route('/{record}/edit'),
        ];
    }
}
