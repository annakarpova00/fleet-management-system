@extends('layouts.app')
@section('title', 'Список автопарков')
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
            ">СПИСОК АВТОПАРКОВ</h1>

                <table style="
                width: 100%;
                border-collapse: collapse;
                margin: 0 auto;
            ">
                    <thead>
                    <tr>
                        <th style="
                            background-color: #4a5568;
                            color: white;
                            font-weight: 600;
                            text-align: center;
                            padding: 1rem;
                        ">НАЗВАНИЕ</th>
                        <th style="
                            background-color: #4a5568;
                            color: white;
                            font-weight: 600;
                            text-align: center;
                            padding: 1rem;
                        ">АДРЕС</th>
                        <th style="
                            background-color: #4a5568;
                            color: white;
                            font-weight: 600;
                            text-align: center;
                            padding: 1rem;
                        ">ПРИВЯЗАННЫЕ МАШИНЫ</th>
                        <th style="
                            background-color: #4a5568;
                            color: white;
                            font-weight: 600;
                            text-align: center;
                            padding: 1rem;
                        ">ДЕЙСТВИЯ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($fleets as $fleet)
                        <tr style="transition: background-color 0.3s;">
                            <td style="
                                padding: 1rem;
                                border-bottom: 1px solid #e2e8f0;
                                text-align: center;
                            ">{{ $fleet->title }}</td>
                            <td style="
                                padding: 1rem;
                                border-bottom: 1px solid #e2e8f0;
                                text-align: center;
                            ">{{ $fleet->address }}</td>
                            <td style="
                                padding: 1rem;
                                border-bottom: 1px solid #e2e8f0;
                                text-align: center;
                            ">{{ $fleet->cars->pluck('number')->join(', ') }}</td>
                            <td style="
                                padding: 1rem;
                                border-bottom: 1px solid #e2e8f0;
                                text-align: center;
                            "> <div style="
                                display: flex;
                                justify-content: center;
                                align-items: center;
                            "><a href="{{ route('fleets.show', $fleet) }}" style="
                                display: inline-block;
                                background-color: #4299e1;
                                color: white;
                                padding: 0.5rem 1rem;
                                border-radius: 4px;
                                text-decoration: none;
                                transition: background-color 0.3s;
                                min-width: 100px;
                                text-align: center;
                                 ">Просмотр</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
