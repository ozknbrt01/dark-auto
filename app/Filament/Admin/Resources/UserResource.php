<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UserResource\Pages;
use App\Models\User;
use App\Models\Vendor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Kullanıcı & Yetki Yönetimi';
    protected static ?string $navigationLabel = 'Kullanıcılar';
    protected static ?string $modelLabel = 'Kullanıcı';
    protected static ?string $pluralModelLabel = 'Kullanıcılar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Hesap ve Kimlik Bilgileri')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('İsim Soyisim')
                            ->placeholder('Örn: Ahmet Yılmaz')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->label('E-Posta Adresi')
                            ->email()
                            ->required()
                            ->unique(User::class, 'email', ignoreRecord: true)
                            ->maxLength(255),

                        Forms\Components\TextInput::make('phone')
                            ->label('Telefon Numarası')
                            ->tel()
                            ->placeholder('Örn: 0555 123 45 67')
                            ->maxLength(20),

                        Forms\Components\TextInput::make('password')
                            ->label('Şifre')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $context): bool => $context === 'create')
                            ->helperText(fn (string $context): ?string => $context === 'edit' ? 'Şifreyi değiştirmek istemiyorsanız boş bırakın.' : null)
                            ->maxLength(255),
                    ]),

                Forms\Components\Section::make('Rol ve Satıcı Yetkilendirmesi')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('role')
                            ->label('Kullanıcı Rolü')
                            ->options([
                                'customer' => 'Müşteri (Standart Alıcı)',
                                'vendor' => 'Satıcı (Mağaza Sahibi / Personeli)',
                                'admin' => 'Yönetici (Süper Admin)',
                            ])
                            ->default('customer')
                            ->live()
                            ->required()
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('is_vendor', $state === 'vendor')),

                        Forms\Components\Toggle::make('is_vendor')
                            ->label('Satıcı Yetkisi Aktif')
                            ->helperText('İşaretlendiğinde satıcı paneline erişim hakkı verilir.')
                            ->live(),

                        Forms\Components\Select::make('vendors')
                            ->label('Yetkili Olduğu Dükkan / Mağaza')
                            ->relationship('vendors', 'store_name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->visible(fn (Get $get) => $get('role') === 'vendor' || (bool) $get('is_vendor'))
                            ->helperText('Bu kullanıcının satıcı panelinde yönetebileceği mağazaları seçin.')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Kullanıcı')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('email')
                    ->label('E-Posta')
                    ->searchable(),

                Tables\Columns\TextColumn::make('role')
                    ->label('Rol')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'admin' => 'danger',
                        'vendor' => 'warning',
                        default => 'info',
                    })
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'admin' => 'Yönetici (Admin)',
                        'vendor' => 'Satıcı (Vendor)',
                        default => 'Müşteri',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('vendors.store_name')
                    ->label('Bağlı Mağaza(lar)')
                    ->badge()
                    ->color('success')
                    ->placeholder('-'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Kayıt Tarihi')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->label('Rol Filtresi')
                    ->options([
                        'customer' => 'Müşteri',
                        'vendor' => 'Satıcı',
                        'admin' => 'Yönetici',
                    ]),
            ])
            ->actions([
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
