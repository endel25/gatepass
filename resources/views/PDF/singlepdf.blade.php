<!DOCTYPE html>
<html>
<body>
  <h2 style="text-align: center;">Weighmast</h2>
    <table>
      <tbody>
        @foreach ($details as $invoicies)
        <tr>
          <td>Ticket No</td>
          <td style="width: 5px;">:</td>
          <td>{{$invoicies->ReceiptTicketID }}</td>   
        </tr>
        <tr>
          <td>Vehicle Number</td>
          <td style="width: 5px;">:</td>
          <td>{{$invoicies->VehicleNumber}}</td>
        </tr>
        <tr>
          <td>Account</td>
          <td style="width: 5px;">:</td>
          <td>{{$invoicies->AccountName}}</td>
        </tr>
        <tr>
          <td>Transaction Mode</td>
          <td style="width: 5px;">:</td>
          <td>{{$invoicies->TransactionMode}}</td>
        </tr>
        <tr>
          <td>Transaction Type</td>
          <td style="width: 5px;">:</td>
          <td>{{$invoicies->TransactionType}}</td>
        </tr>
        <tr>
          <td>Gross Weight</td>
          <td style="width: 5px;">:</td>
          <td>{{number_format((float)$invoicies->GrossWeight, 1, '.', '')}} {{$invoicies->WeightUnit}}</td>
        </tr>
        <tr>
          <td>Gross Time</td>
          <td style="width: 5px;">:</td>
          <td>{{$invoicies->GrossTime}}</td>
        </tr>
        <tr>
          <td>Tare Weight</td>
          <td style="width: 5px;">:</td>
          <td>{{number_format((float)$invoicies->TareWeight, 1, '.', '')}} {{$invoicies->WeightUnit}}</td>
        </tr>
         <tr>
          <td>Tare Time</td>
          <td style="width: 5px;">:</td>
          <td>{{$invoicies->TareTime}}</td>
        </tr>
        <tr>
          <td>Net Weight</td>
          <td style="width: 5px;">:</td>
          <td>{{number_format((float)$invoicies->NetWeight, 1, '.', '')}} {{$invoicies->WeightUnit}}</td>
        </tr>
        <tr>
          <td>Charges</td>
          <td style="width: 5px;">:</td>
          <td>{{$invoicies->Charges}}</td>
        </tr>
           @endforeach  
      </tbody>
    </table>
</body>
</html>


