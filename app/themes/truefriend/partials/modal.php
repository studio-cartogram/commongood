<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content text--center">
			<div class="modal-body">
				<?php 
				    $form = get_field('subscribe_form', 'option');
					gravity_form_enqueue_scripts($form->id, true);
					gravity_form($form->id, true, true, false, '', true, 1); 
				?>
			</div>
			<div class="modal-footer">
				<a href="#" class="" data-dismiss="modal">close</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->