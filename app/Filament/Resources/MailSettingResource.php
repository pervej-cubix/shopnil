<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MailSettingResource\Pages;
use App\Filament\Resources\MailSettingResource\RelationManagers;
use App\Models\MailSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MailSettingResource extends Resource
{
    protected static ?string $model = MailSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('mail_transport')->required(),
                Forms\Components\TextInput::make('mail_host')->required(),
                Forms\Components\TextInput::make('mail_port')->required(),
                Forms\Components\TextInput::make('mail_username')->required(),
                Forms\Components\TextInput::make('mail_password')->required(),
                Forms\Components\TextInput::make('mail_encryption')->required(),
                Forms\Components\TextInput::make('mail_from')->required(),
                Forms\Components\TextInput::make('mail_to')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mail_transport'),
                Tables\Columns\TextColumn::make('mail_host'),
                Tables\Columns\TextColumn::make('mail_port'),
                Tables\Columns\TextColumn::make('mail_username'),
                Tables\Columns\TextColumn::make('mail_password'),
                Tables\Columns\TextColumn::make('mail_encryption'),
                Tables\Columns\TextColumn::make('mail_from'),
                Tables\Columns\TextColumn::make('mail_to'),
                
                
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
            'index' => Pages\ListMailSettings::route('/'),
            'create' => Pages\CreateMailSetting::route('/create'),
            'edit' => Pages\EditMailSetting::route('/{record}/edit'),
        ];
    }
}
