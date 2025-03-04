<?php
namespace App\Filament\Resources;

use Filament\Forms\Components\Repeater;
use App\Filament\Resources\RoomResource\Pages;
use App\Filament\Resources\RoomResource\RelationManagers;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),                
                
                Forms\Components\Textarea::make('description')
                    ->required(),
                    
                Forms\Components\FileUpload::make('image')
                    ->required(),
                    
                Forms\Components\TextInput::make('price')
                    ->required(),
                

                    // json data 

                    Forms\Components\Textarea::make('fetcher') // Using a textarea for multiple values
                    ->label('Fetcher Items')
                    ->placeholder('Enter values separated by commas, e.g., fetcher1, fetcher2, fetcher3')
                    ->required()
                    ->rows(3) // Adjust the size of the textarea if needed
                

                    
                
                

            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('fetcher'),
                Tables\Columns\TextColumn::make('description'),               

                  
            ])
            ->filters([
                // Define filters if needed
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
            // Define relations if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
