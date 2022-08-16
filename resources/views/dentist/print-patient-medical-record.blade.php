@extends('layouts.print-layout')


@section('extracss')
    <style>
        table tr td{
            /* border: 1px solid red; */
            width: 300px;
            padding: 10px;
        }
  
    

        .attribute-title{
            font-weight: bold;
        }

        .table2 tr th{
            text-align: center;
            padding: 15px 0 15px 0;
        }
        .table2 tr td{
            border: 1px solid rgb(172, 172, 172);
        }

    </style>
@endsection
@section('content')


    <div class="printarea">
        <div style="font-weight: bold; text-align: center; font-size: 1.4em;">
            MEDICAL RECORD
        </div>

        <table style="border: 1px solid rgb(172, 172, 172);">
            <tr style="border-bottom: 1px solid rgb(172, 172, 172);">
                <td><span class="attribute-title">LASTNAME:</span> {{ $admitData->patient->lname }}</td>

                <td><span class="attribute-title">FIRSTNAME:</span> {{ $admitData->patient->fname }}</td>

                <td><span class="attribute-title">MIDDLENAME:</span> {{ $admitData->patient->mname }}</td>
            </tr>

            <tr style="border-bottom: 1px solid rgb(172, 172, 172);">
                <td><span class="attribute-title">PROVINCE:</span> {{ $admitData->patient->provDesc }}</td>

                <td><span class="attribute-title">CITY:</span> {{ $admitData->patient->citymunDesc }}</td>

                <td><span class="attribute-title">BARANGAY:</span> {{ $admitData->patient->brgyDesc }}</td>
            </tr>

            <tr>
                <td><span class="attribute-title">EMAIL:</span> {{ $admitData->patient->email }}</td>

                <td><span class="attribute-title">MOBILE #:</span> {{ $admitData->patient->contact_no }}</td>

                <td><span class="attribute-title">SEX:</span> {{ $admitData->patient->sex }}</td>
            </tr>

        </table>

        <br>

        <table class="table2" style="border: 1px solid rgb(172, 172, 172);">
            <thead>
                <th>REF #</th>
                <th>SERVICES</th>
                <th>DATE RENDERED</th>
                <th>ITEM(S) USED</th>
            </thead>

            @foreach($admitData->admit_services as $item)
                <tr>
                    <td>{{ $item->admit_service_id }}</td>
                    <td>{{ $item->services->service }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        @foreach($item->service_inventories as $inv)
                            {{ $inv->item_name }}; &nbsp;
                        @endforeach
                    </td>
                </tr>
                
            @endforeach
            
        </table>
    </div>



@endsection
