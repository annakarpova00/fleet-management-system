@extends('layouts.app')
@section('title')
    Автопарк {{$fleet->title}}
@endsection

@section('content')
    <div style="
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
    padding: 2rem 0;
">
        <div style="
        max-width: 1200px;
        margin: 0 auto;
    ">
            <div style="
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin: 2rem auto;
        ">
                <h1 style="
                color: #2d3748;
                text-align: center;
                font-weight: 700;
                margin-bottom: 2rem;
                font-size: 2.25rem;
            ">{{ $fleet->title }}</h1>

                <div style="
                background-color: #f7fafc;
                border-radius: 6px;
                padding: 1.5rem;
                margin-bottom: 2rem;
            ">
                    <p style="
                    font-size: 1.125rem;
                    color: #4a5568;
                    margin-bottom: 1rem;
                "><strong>АДРЕС:</strong> {{ $fleet->address }}</p>

                    <p style="
                    font-size: 1.125rem;
                    color: #4a5568;
                    margin-bottom: 0;
                "><strong>ГРАФИК РАБОТЫ:</strong> {{ $fleet->work_schedule ? $fleet->work_schedule : '8:00 - 12:00' }}</p>
                </div>

                <h3 style="
                color: #2d3748;
                font-weight: 600;
                margin-bottom: 1rem;
                font-size: 1.5rem;
                text-align: center;
            ">МАШИНЫ В СОСТАВЕ АВТОПАРКА:</h3>

                <ul style="
                list-style-type: none;
                padding: 0;
                margin: 0 0 2rem 0;
            ">
                    @foreach ($fleet->cars as $car)
                        <li style="
                        background-color: #edf2f7;
                        border-radius: 4px;
                        padding: 1rem;
                        margin-bottom: 0.75rem;
                        display: flex;
                        justify-content: center;
                        font-size: 1.125rem;
                        color: #4a5568;
                    ">{{ $car->number }} - Водитель: {{ $car->driver_name }}</li>
                    @endforeach
                </ul>

                <div style="
                display: flex;
                justify-content: center;
            ">
                    <a href="{{ route('fleets.index') }}" style="
                    display: inline-block;
                    background-color: #4299e1;
                    color: white;
                    padding: 0.75rem 1.5rem;
                    border-radius: 4px;
                    text-decoration: none;
                    transition: background-color 0.3s;
                    font-size: 1rem;
                    font-weight: 500;
                    min-width: 120px;
                    text-align: center;
                ">Назад к списку</a>
                </div>
            </div>
        </div>
    </div>
@endsection
