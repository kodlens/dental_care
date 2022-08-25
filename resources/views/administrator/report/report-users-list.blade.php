@extends('layouts.print-layout')

@section('content')



    <div class="section">
        <div class="columns">
            <div class="column">
                <div class="buttons">
                    <button class="button is-info" onclick="history.back()">BACK</button>
                </div>
                <div class="printarea">
                    <div style="text-align: center; font-weight:bold; font-size: 1.2em;">USERS LIST</div>
                    <table style="margin: auto;" class="table">
                        <thead>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Contact No</th>
                        <th>Sex</th>
                        </thead>
                        <tbody>
                        @foreach($users as $item)
                            <tr>
                                <td>{{ $item->user_id }}</td>
                                <td>{{ $item->lname }}</td>
                                <td>{{ $item->fname }}</td>
                                <td>{{ $item->mname }}</td>
                                <td>{{ $item->contact_no }}</td>
                                <td>{{ $item->sex }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


@endsection


