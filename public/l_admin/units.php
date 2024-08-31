<?php
include ('header.php');
?> 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>

        <main class="h-full pb-16 overflow-y-auto">
          <!-- Remove everything INSIDE this div to a really blank page -->
          <div class="container px-6 mx-auto grid">
          <br>
            <style>
              .btn {
                background-color: #7e3af2;
                border: none;
                color: white;
                padding: 12px 16px;
                font-size: 16px;
                cursor: pointer;
              }

              /* Darker background on mouse-over */
              .btn:hover {
                background-color: RoyalBlue;
              }
              </style>
            <br>
            <form method=post action="dashboard">
            <button class="btn" submit="dash"><i class="fa fa-home"></i> Back to Dashboard</button>
            </form>
            <h4
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
          >
            Apartment Units
          </h4>
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <h5
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            align="center"
          >
            UNIT DETAILS
          </h5>
            <div class="w-full overflow-x-auto">
              <table class="table table-bordered table-striped" id="fetch_units">
                <thead>
                  <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                  >
                    
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">House No</th>
                    <th class="px-4 py-3">Apartment Name</th>
                    <th class="px-4 py-3">Floor</th>
                    <th class="px-4 py-3">Rent</th>
                    <th class="px-4 py-3">Deposit</th>
                    <th class="px-4 py-3">Unit Size</th>
                    <th class="px-4 py-3">Condition</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Water Meter No</th>
                    <th class="px-4 py-3">Balances</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>

<script type="text/javascript" language="javascript" >
                $(document).ready(function(){
                var sessionVariable = "<?php echo $_SESSION['username']; ?>";

                var dataTable = $('#fetch_units').DataTable({

                  "processing" : true,
                  "serverSide" : true,
                  "order" : [],
                  "ajax" : {
                  url:"../codeAjax/unitHelper.php",
                  type:"POST",
                  data: { sessionVariable: sessionVariable }
                  }
                });

                $('#fetch_units').on('draw.dt', function(){
                  $('#fetch_units').Tabledit({
                  url:'../codeAjax/UpdateHelper.php',
                  dataType:'json',
                  columns:{
                    identifier : [0, 'id'],
                    editable:[[1, 'hseNo'], [2, 'ApartmtName'], [3, 'Floor'],  [4, 'Rent'], [5, 'Deposit'], [6, 'UnitSize'], [7, 'HCondition'], [8, 'HStatus'], [9, 'h2oMeterNo'], [10, 'balances']]
                  },
                  restoreButton:false,
                  onSuccess:function(data, textStatus, jqXHR)
                  {
                    if(data.action == 'delete')
                    {
                    $('#' + data.id).remove();
                    $('#fetch_units').DataTable().ajax.reload();
                    }
                  }
                  });
                });
                  
                }); 
</script>
