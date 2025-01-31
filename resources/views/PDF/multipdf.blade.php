<!DOCTYPE html>
<html>
<body>
  <h2 style="text-align: center;">Weighmast</h2> 
<table>
  <tbody>
     @foreach ($details as $invoicies)
     @endforeach
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
      <td>Charges</td>
      <td style="width: 5px;">:</td>
      <td>{{$invoicies->Charges}}</td>
    </tr>
  </tbody>
</table>
<table style="{font-family: arial, sans-serif;border-collapse: collapse;}td, th {border: 1px solid black;text-align: left;padding: 5px;}">
        <thead>
           <tr>
              <th>Gross Weight</th>
              <th>Gross Time</th>
              <th>Tare Weight</th>
              <th>Tare Time</th>
              <th>Net Weight</th>
              <th>Scale</th>
              <th>Product</th>
              <th>gate</th>
              <th>User</th>
           </tr>
        </thead>
        <tbody>
          @foreach ($MultiTable as $MultiTables)
              <tr> 
              <td> {{number_format((float)$MultiTables->GrossWeight, 1, '.', '')}}</td>
              <td>{{$MultiTables->GrossTime}}</td>
              <td>{{number_format((float)$MultiTables->TareWeight, 1, '.', '')}}</td>
              <td>{{$MultiTables->TareTime}}</td>
              <td>{{number_format((float)$MultiTables->NetWeight, 1, '.', '')}}</td> 
              <td></td>
              <td>{{$MultiTables->ProductName}}</td>
              <td>{{$MultiTables->GateName}}</td>
              <td>{{$MultiTables->CreatedBy}}</td>
              </tr>
          @endforeach
        </tbody>
</table>
<table>
  <tbody>
     <tr>
      <td>Total Net Weight</td>
      <td style="width: 5px;">:</td>
      <td>{{number_format((float)$MultiTables->totalNetWeight, 2, '.', '')}}</td>
    </tr>
  </tbody>
</table>   
</body>
</html>
