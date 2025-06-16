@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Редактирование цен на билеты</h1>
    
    <form method="POST" action="{{ route('admin.ticket-prices.update') }}">
        @csrf
        
        <div class="form-group">
            <label>Взрослый билет (будни):</label>
            <input type="number" name="adult_weekday_price" value="{{ $prices->adult_weekday_price }}" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Взрослый билет (выходные):</label>
            <input type="number" name="adult_weekend_price" value="{{ $prices->adult_weekend_price }}" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Детский билет (будни):</label>
            <input type="number" name="child_weekday_price" value="{{ $prices->child_weekday_price }}" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Детский билет (выходные):</label>
            <input type="number" name="child_weekend_price" value="{{ $prices->child_weekend_price }}" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Групповой билет:</label>
            <input type="number" name="group_price" value="{{ $prices->group_price }}" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Минимум человек в группе:</label>
            <input type="number" name="group_min_people" value="{{ $prices->group_min_people }}" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Школьные группы:</label>
            <input type="number" name="school_group_price" value="{{ $prices->school_group_price }}" class="form-control">
        </div>
        
        <button type="submit" class="filter-btn">
    <i class="fas fa-filter"></i> Применить
</button>
    </form>
</div>
@endsection