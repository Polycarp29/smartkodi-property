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
          <form>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Select Property
              </span>
              <select
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                <?php 
                    $valueName = $_SESSION['username'];
                    global $valueName;
                    include('../auth/selectDataprpty.php');
                    ?>
                    <?php if($data):?>
                      <?php foreach($data as $row): ?>
            
                <option value = "1"><?= $row['prptyName'] ?></option>
                <?php endforeach; ?>
                <?php else: ?>
                  <?php if($data == false): ?>
                <option style ="color:red"><?= "No Property Data" ?></option>
                    <?php endif ?>
                <?php endif ?>
                
              </select>
            </label>

            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Unit Status
              </span>
              <select
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                
              > <option>Vacated Tenants</option>
                <option>Occupied Tenants</option>
                <option>To Vacate on Notice</option>
                <option>All</option>
              </select>
            </label>  
            </div>
            <div>
              <button
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
              >
                Generate
              </button>
            </div>
                  </form>
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <h5
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            align="center"
          >
            UNIT TENANT DETAILS 
          </h5>
            <div class="w-full overflow-x-auto">
              <table class="table table-bordered table-striped" id="sample_data">
                <thead>
                  <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                  >
                    
                  <th class="px-4 py-3">ID</th>
                  <th class="px-4 py-3">First Name</th>
                  <th class="px-4 py-3">Last Name</th>
                  <th class="px-4 py-3">Username</th>
                  <th class="px-4 py-3">Email</th>
                  <th class="px-4 py-3">Tenant Type</th>
                  <th class="px-4 py-3">Gender</th>
                  <th class="px-4 py-3">Next Of Kin</th>
                  <th class="px-4 py-3">Next Of Kin Contact</th>
                  <th class="px-4 py-3">Nationality</th>
                  <th class="px-4 py-3">ID Number</th>
                  <th class="px-4 py-3">Mobile No</th>
                  <th class="px-4 py-3">Apartment Name</th>
                  <th class="px-4 py-3">Unit No</th>
                  <th class="px-4 py-3">Date Time</th>
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
          

            <!---JavaScript Code Goes here-->

            <script type="text/javascript" language="javascript" >
                $(document).ready(function(){
                var sessionVariable = "<?php echo $_SESSION['username']; ?>";

                var dataTable = $('#sample_data').DataTable({

                  "processing" : true,
                  "serverSide" : true,
                  "order" : [],
                  "ajax" : {
                  url:"../codeAjax/fetch.php",
                  type:"POST",
                  data: { sessionVariable: sessionVariable }
                  }
                });

                $('#sample_data').on('draw.dt', function(){
                  $('#sample_data').Tabledit({
                  url:'../codeAjax/action.php',
                  dataType:'json',
                  columns:{
                    identifier : [0, 'id'],
                    editable:[[1, 'firstName'], [2, 'lastName'], [3, 'username'], [4, 'email'], [5, 'tntType'], [6, 'gender', '{"1":"Male","2":"Female"}'], [7,'nextofKin'], [8, 'nextofKinC'], [9, 'nationality'], [10, 'idNo'], [11, 'mobileNo'], [12, 'ApartmtName'], [13, 'hseNo'], [14, 'dateTime']]
                  },
                  restoreButton:false,
                  onSuccess:function(data, textStatus, jqXHR)
                  {
                    if(data.action == 'delete')
                    {
                    $('#' + data.id).remove();
                    $('#sample_data').DataTable().ajax.reload();
                    }
                  }
                  });
                });
                  
                }); 
</script>
            
        
