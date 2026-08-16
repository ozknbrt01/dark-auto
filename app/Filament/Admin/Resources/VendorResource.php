<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\VendorResource\Pages;
use App\Models\User;
use App\Models\Vendor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationGroup = 'Satıcı Yönetimi';
    protected static ?string $navigationLabel = 'Satıcılar & Mağazalar';
    protected static ?string $modelLabel = 'Satıcı';
    protected static ?string $pluralModelLabel = 'Satıcılar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Mağaza ve Sahip Bilgileri')
                    ->description('Satıcının dükkan detayları ve sisteme bağlı kullanıcı hesabı.')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('Dükkan Sahibi (Kullanıcı)')
                            ->relationship('user', 'name')
                            ->getOptionLabelFromRecordUsing(fn (User $record) => "{$record->name} ({$record->email})")
                            ->searchable()
                            ->preload()
                            ->required()
                            ->helperText('Bu dükkanı yönetecek kayıtlı kullanıcıyı seçin.'),

                        Forms\Components\TextInput::make('store_name')
                            ->label('Dükkan Adı')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),

                        Forms\Components\TextInput::make('slug')
                            ->label('URL Dostu Adı (Slug)')
                            ->required()
                            ->unique(Vendor::class, 'slug', ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('Otomatik oluşturulur, dilerseniz özelleştirebilirsiniz.'),

                        Forms\Components\TextInput::make('tax_number')
                            ->label('Vergi Numarası / TCKN')
                            ->maxLength(50)
                            ->placeholder('Örn: 1234567890'),

                        Forms\Components\Select::make('status')
                            ->label('Mağaza Durumu')
                            ->options([
                                'pending' => 'Onay Bekliyor',
                                'active' => 'Aktif',
                                'inactive' => 'Pasif',
                            ])
                            ->default('pending')
                            ->required(),

                        Forms\Components\TextInput::make('commission_rate')
                            ->label('Komisyon Oranı (%)')
                            ->numeric()
                            ->default(10.00)
                            ->suffix('%')
                            ->required(),

                        Forms\Components\Textarea::make('description')
                            ->label('Dükkan Açıklaması / Hakkında')
                            ->rows(4)
                            ->columnSpanFull()
                            ->placeholder('Mağaza hakkında tanıtıcı bilgi, adres ve uzmanlık alanları...'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('store_name')
                    ->label('Dükkan Adı')
                    ->weight('bold')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Dükkan Sahibi')
                    ->description(fn (Vendor $record): ?string => $record->user?->email)
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tax_number')
                    ->label('Vergi No')
                    ->searchable()
                    ->placeholder('-'),

                Tables\Columns\TextColumn::make('commission_rate')
                    ->label('Komisyon')
                    ->suffix('%')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Durum')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Onay Bekliyor',
                        'active' => 'Aktif',
                        'inactive' => 'Pasif',
                        default => $state,
                    })
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'active',
                        'danger' => 'inactive',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Kayıt Tarihi')
                    ->dateTime('d.m.Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Mağaza Durumu')
                    ->options([
                        'pending' => 'Onay Bekliyor',
                        'active' => 'Aktif',
                        'inactive' => 'Pasif',
                    ]),
            ])
            ->actions([
                Tables\Actions\Action::make('approve')
                    ->label('Onayla')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn (Vendor $record): bool => $record->status === 'pending')
                    ->action(fn (Vendor $record) => $record->update(['status' => 'active'])),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVendors::route('/'),
            'create' => Pages\CreateVendor::route('/create'),
            'edit' => Pages\EditVendor::route('/{record}/edit'),
        ];
    }
}
