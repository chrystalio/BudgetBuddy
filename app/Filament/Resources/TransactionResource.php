<?php

namespace App\Filament\Resources;

use App\CategoryType;
use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Category;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('type')
                    ->options([
                        CategoryType::EXPENSE->value => 'Expense',
                        CategoryType::INCOME->value => 'Income',
                    ])
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn ($state, $set, $get) => $set('category_id', null)),
                Forms\Components\Select::make('category_id')
                    ->options(function ($get) {
                        $type = $get('type');
                        if ($type) {
                            return Category::where('type', $type)->pluck('name', 'id');
                        }
                        return Category::pluck('name', 'id');
                    })
                    ->required()
                    ->label('Category'),
                Forms\Components\DatePicker::make('date')->required(),
                Forms\Components\Hidden::make('user_id')
                    ->default(fn () => Auth::id())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\TextColumn::make('category.name')->label('Category'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('date'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        CategoryType::EXPENSE->value => 'Expense',
                        CategoryType::INCOME->value => 'Income',
                    ]),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
