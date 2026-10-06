<?php

namespace App\Filament\Vendor\Resources;

use App\Filament\Vendor\Resources\CampaignResource\Pages;
use App\Filament\Vendor\Resources\CampaignResource\RelationManagers;
use App\Models\Campaign;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CampaignResource extends Resource
{
    protected static ?string $model = Campaign::class;

    protected static ?string $modelLabel = 'Kampanya';
    protected static ?string $pluralModelLabel = 'Kampanyalar';
    protected static ?string $navigationLabel = 'Kampanyalarım';
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Kampanya Başlığı')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Örn: Dev Kampanya'),
                Forms\Components\TextInput::make('discount_text')
                    ->label('İndirim Metni')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Örn: Seçili Ürünlerde %20 İndirim'),
                Forms\Components\DateTimePicker::make('end_date')
                    ->label('Bitiş Tarihi')
                    ->nullable(),
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif mi?')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Başlık')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount_text')
                    ->label('İndirim Metni')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Durum')
                    ->boolean(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('Bitiş Tarihi')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Oluşturulma')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCampaigns::route('/'),
            'create' => Pages\CreateCampaign::route('/create'),
            'edit' => Pages\EditCampaign::route('/{record}/edit'),
        ];
    }
}
