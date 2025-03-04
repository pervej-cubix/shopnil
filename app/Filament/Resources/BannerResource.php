<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('room_banner')->required(),
                Forms\Components\FileUpload::make('meeting_banner')->required(),
                Forms\Components\FileUpload::make('restaurant_banner')->required(),
                Forms\Components\FileUpload::make('reservation_banner')->required(),
                Forms\Components\FileUpload::make('special_offer_banner')->required(),
                Forms\Components\FileUpload::make('gallery_banner')->required(),
                Forms\Components\FileUpload::make('contact_banner')->required(),
               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('room_banner'),
                Tables\Columns\ImageColumn::make('meeting_banner'),
                Tables\Columns\ImageColumn::make('restaurant_banner'),
                Tables\Columns\ImageColumn::make('reservation_banner'),
                Tables\Columns\ImageColumn::make('special_offer_banner'),
                Tables\Columns\ImageColumn::make('gallery_banner'),
                Tables\Columns\ImageColumn::make('contact_banner'),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
