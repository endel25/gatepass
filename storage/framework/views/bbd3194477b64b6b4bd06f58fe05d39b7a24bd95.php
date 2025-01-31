
<?php $__env->startSection('content'); ?>
<section class="content-header">
  <div class="mb-2 flex items-center justify-between">
    <h5 class="text-lg font-semibold dark:text-white-light">Add User</h5>
    <a type="button" href="<?php echo e(route('users.index')); ?>" class="btn btn-sm btn-l btn-primary rounded-full">Back</a>
  </div>
</section>
<section class="content">
  <div class="panel">
    <form class="space-y-2" id="myForm" action="<?php echo e(route('users.store')); ?>" method="POST" autocomplete="off">
      <?php echo csrf_field(); ?>
      <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
        <!-- Left Section -->
        <div class="flex-1 max-w-lg space-y-4 sm:space-x-4">
          <div class="flex sm:flex-row flex-col" id="FirstNameField">
            <label for="FirstName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">First Name</label>
            <input type="text" placeholder="Enter First Name" class="text-xs form-input flex-auto" name="FirstName" id="FirstName" value="<?php echo e(old('FirstName')); ?>">
          </div>
          <div class="flex sm:flex-row flex-col" id="LastNameField">
            <label for="LastName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Last Name</label>
            <input type="text" placeholder="Enter Last Name" class="text-xs form-input flex-auto" name="LastName" id="LastName" value="<?php echo e(old('LastName')); ?>">
          </div>
          <div class="flex sm:flex-row flex-col" id="UserNameField">
             <label for="UserName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">User Name</label>
             <input type="text" placeholder="Enter User Name" class="text-xs form-input flex-auto" name="email" id="email" value="<?php echo e(old('email')); ?>" autocomplete="off" oninput="this.value = this.value.replace(/\s+/g, '').toLowerCase()">
         </div>

          <div class="flex sm:flex-row flex-col" id="PasswordField">
            <label for="Password" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Password</label>
            <input type="password" placeholder="Enter Password" class="text-xs form-input flex-auto" name="password" id="password" value="<?php echo e(old('password')); ?>" autocomplete="off">
          </div>
          <div class="flex sm:flex-row flex-col" id="ConfirmPasswordField">
           <label for="ConfirmPassword" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Confirm Password</label>
           <input type="password" placeholder="Confirm Password" class="text-xs form-input flex-auto" name="ConfirmPassword" id="ConfirmPassword" value="<?php echo e(old('ConfirmPassword')); ?>" autocomplete="off">
         </div>
          
        </div>
        <!-- Right Section -->
        <div class="flex-1 max-w-lg space-y-4" style="margin-left: 2.2rem;">
         <div class="flex sm:flex-row flex-col" id="ContactNoField">
            <label for="ContectNo" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Contact No.</label>
            <input type="text" placeholder="Enter Contact No." class="text-xs form-input flex-auto" x-mask="999-9999999" name="ContactNo" id="ContactNo" value="<?php echo e(old('ContactNo')); ?>" autocomplete="off">
         </div>
          <div class="flex sm:flex-row flex-col" id="EmailIdField">
            <label for="EmailId" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Email Id</label>
            <input type="email" placeholder="Enter Email Id" class="text-xs form-input flex-auto" name="EmailId" id="EmailId" value="<?php echo e(old('EmailId')); ?>">
          </div>
          <div class="flex sm:flex-row flex-col" id="AddressField">
            <label for="Address" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Address</label>
            <input type="text" placeholder="Enter Address" class="text-xs form-input flex-auto" name="Address" id="Address" value="<?php echo e(old('Address')); ?>">
          </div>
          <div class="flex sm:flex-row flex-col" id="UserNameField">
            <label class="mb-0 sm:ltr:mr-2 rtl:ml-2" style="width: 20%;">User Role</label>
            <select id="UserRoleId" name="UserRoleId" class="text-xs flex-1 flex-auto form-input">
               <option value="">Select Userrole</option>
               <?php $__currentLoopData = $userrole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userroles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option <?php echo e(old('UserRoleId') == $userroles->id ?'selected':''); ?> value="<?php echo e($userroles->id); ?>"><?php echo e($userroles->UserRoleName); ?></option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="flex sm:flex-row flex-col">
            <label class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Notes</label>
            <textarea class="text-xs flex-auto form-input" name="Notes"></textarea>
          </div>
        </div>
      </div>

      <button type="submit" id="submitBtn" class="btn btn-outline-primary btn-sm rounded-full !mt-6">Create</button>
    </form>
  </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('Script'); ?>
<script type="text/javascript">
   // Dropdown
   document.addEventListener("DOMContentLoaded", function(e) {
       // seachable 
       var options = {
           searchable: true
       };
       NiceSelect.bind(document.getElementById("UserRoleId"), options);
   });

     $(document).ready(function() {
      $("#myForm").submit(function(event) {
          event.preventDefault();

          var FirstName = $("#FirstName").val();
          var LastName = $("#LastName").val();
          var email = $("#email").val();
          var password = $("#password").val();
          var ConfirmPassword = $("#ConfirmPassword").val();
          var UserRoleId = $("#UserRoleId").val();
          
          if (!FirstName) {
              $("#FirstNameField").addClass("has-error");
              showMessage('Field FirstName is required','error');
          } 
          else if (!LastName) {
               $("#UserNameField").addClass("has-error");
              showMessage('Field LastName is required','error');
          }
          else if (!email) {
            $("#UserNameField").addClass("has-error");
            showMessage('Field UserName is required','error');
          }
          else if (password !== ConfirmPassword) {
            showMessage('Passwords do not match.','error');
          }
          else if (!UserRoleId) {
            showMessage('Field UserRoleId is required','error');
          } 
          else {
              showMessage('User details created successfully.','success');
              $("#myForm").unbind('submit').submit();
          }
      });


      $('#FirstName').on('input', function() {
        $('#FirstNameField').removeClass('has-error').addClass('has-success');
      });
      $('#LastName').on('change', function() {
        $('#UserNameField').removeClass('has-error').addClass('has-success');
      });
      $('#email').on('change', function() {
        $('#UserNameField').removeClass('has-error').addClass('has-success');
      });
      $('#password').on('change', function() {
        $('#UserNameField').removeClass('has-error').addClass('has-success');
      });
      $('#UserRoleId').on('change', function() {
        $('#UserNameField').removeClass('has-error').addClass('has-success');
      });

     
      

  });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Program Files\Ampps\www\cloud-gatepass\resources\views/users/create.blade.php ENDPATH**/ ?>