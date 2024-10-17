<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="statistics">
        <table>
            <thead>
                <th>Птица</th>
                <th>Сколько раз</th>
                <th>В последний раз</th>
                <th>Координаты</th>
            </thead>
            <tbody>
                @foreach($sorted_birds as $bird)
                    <tr>
                        <td>{{ $bird["last_seen"]["bird_id"] }}</td>
                        <td>{{ $bird["count"] }}</td>
                        <td>{{ $bird["last_seen"]["date_seen"] }}</td>
                        <td>{{ $bird["last_seen"]["latitude"] }}, {{ $bird["last_seen"]["longitude"] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
