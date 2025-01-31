
<?php $__env->startSection('content'); ?>
<section class="content-header">
   <div class="mb-2 flex items-center justify-between">
      <h5 class="text-lg font-semibold dark:text-white-light">Add Product</h5>

      <a type="button" href="<?php echo e(route('products.index')); ?>" class="btn btn-sm btn-l btn-primary rounded-full">Back</a>

   </div>
</section>
<section class="content" >
	
		<div class="panel">
			<form class="space-y-5" id="myForm" action="<?php echo e(route('products.store')); ?>" method="POST">
				<?php echo csrf_field(); ?>
			    <div class="flex sm:flex-row flex-col" id="ProductTypeField">
			        <label  class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Product Type</label>
			        <select id="ProductType" name="ProductType" class="text-xs flex-1 form-input">
			        <option></option>
				    <?php $__currentLoopData = $ptype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ptypes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    <option <?php echo e($ptypes->FieldValue == old('ProductType')?'selected':''); ?> value="<?php echo e($ptypes->FieldValue); ?>"><?php echo e($ptypes->FieldValue); ?></option>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
			    </div>
			    <div class="flex sm:flex-row flex-col" id="ProductNameField">
				    <label for="ProductName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Product Name</label>
				    <input type="text" placeholder="Enter Product Name" class="text-xs form-input flex-1" name="ProductName" id="ProductName" value="<?php echo e(old('ProductName')); ?>" >

				</div>
			    <div class="flex sm:flex-row flex-col" id="ProductCodeField">
			        <label  class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Product Code</label>
			        <input type="text" placeholder="Enter Product Code" class="text-xs form-input flex-1" name="ProductCode" id="ProductCode" value="<?php echo e(old('ProductCode')); ?>">
			    </div>
			    <div class="flex sm:flex-row flex-col" id="ProductUnitField">
			        <label  class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Product Unit</label>
			        <input type="text" placeholder="Enter Product Unit" class="text-xs form-input flex-1" name="ProductUnit" id="ProductUnit" value="<?php echo e(old('ProductUnit')); ?>">
			    </div>
			    <div class="flex sm:flex-row flex-col">
			        <label  class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Product Price</label>
			        <input type="text" x-mask="9999999" placeholder="Enter Product Price" class="text-xs form-input flex-1" name="ProductPrice" id="ProductPrice" value="<?php echo e(old('ProductPrice')); ?>">
			    </div>
			    <div class="flex sm:flex-row flex-col">
			        <label  class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Theoratical Weight</label>
			        <input type="text" x-mask="9999999" placeholder="Enter Theoratical Weight" class="text-xs form-input flex-1" name="TheoraticalWeight" id="TheoraticalWeight" value="<?php echo e(old('TheoraticalWeight')); ?>">
			    </div>
			    <div class="flex sm:flex-row flex-col">
			        <label  class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Notes</label>
			       	<textarea class="text-xs flex-1 form-input"></textarea>
			    </div>
				<button type="submit" id="submitBtn" class="btn btn-outline-primary btn-sm rounded-full !mt-6">Create</button>
		</form>
	</div>
</section>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('Script'); ?>
<script>

	// Dropdown
	document.addEventListener("DOMContentLoaded", function(e) {
	    // seachable 
	    var options = {
	        searchable: true
	    };
	    NiceSelect.bind(document.getElementById("ProductType"), options);
	});
 
  $(document).ready(function() {
	  $("#myForm").submit(function(event) {
	      event.preventDefault();
	      var ProductType = $("#ProductType").val();
	      var ProductName = $("#ProductName").val();
	      var ProductCode = $("#ProductCode").val();
	      if (!ProductType) {
	          $("#ProductTypeField").addClass("has-error");
	          showMessage('Field ProductType is required','error');
	      } 
	      else if (!ProductName) {
	           $("#ProductNameField").addClass("has-error");
	          showMessage('Field ProductName is required','error');
	      }
	      else if (!ProductCode) {
	       	$("#ProductCodeField").addClass("has-error");
	          showMessage('Field ProductCode is required','error');
	          
	      } else {
	          showMessage('Product details created successfully.','success');
	          $("#myForm").unbind('submit').submit();
	      }
	  });
 	$('#ProductType').on('input', function() {
    		$('#ProductTypeField').removeClass('has-error').addClass('has-success');
	});
	$('#ProductName').on('change', function() {
    		$('#ProductNameField').removeClass('has-error').addClass('has-success');
	});
	$('#ProductCode').on('change', function() {
    		$('#ProductCodeField').removeClass('has-error').addClass('has-success');
	});

     
      

  });
</script>

<?php $__env->stopSection(); ?>
	

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Program Files\Ampps\www\gatepass\resources\views/products/create.blade.php ENDPATH**/ ?>