<div id="search" class="card card-header col-md-12" style="padding-left:0;padding-right:0;padding-bottom:0">
<form method="POST" class="navbar-form" action="/search" accept-charset="UTF-8">
@csrf

	<table class="table" style="margin-bottom:0;">
		<thead>
		<tr>
			<td class="form-group" style="border-top:none">
				<select class="form-control" id="s" name="s" v-model='soorahs' @change="onChange($event)" >
					<option selected="selected" value="0">Surələr</option>
					<?php foreach(Config::get('quranmeta.aze') as $k=>$v){?>
						<option value="{{ $k }}">{{ $v }}</option>
					<?php }?> 
				</select>
			</td>
			<td class="form-group  w-25" style="border-top:none">
				<input placeholder="Ayələr" class="form-control" id="a" size="3" maxlength="3" min="1" max="286" name="a" type="number" :disabled="isDisabled == 1"/>
			</td>
			<td align="left" valign="bottom" class="form-group" style="border-top:none">
				<select class="form-control" id="t" name="t"><option value="">Tərcüməçi</option>
				<?php $trns = array('1' => 'Əlixan Musayev', '3' => ' Эльмир Кулиев', '2'=>'Bünyadov-Məmmədəliyev');
				foreach($trns as $k=>$v){?>
					<option value="{{ $k }}" <?php if($k==old('t')) echo "selected";?> >{{ $v }}</option>
				<?php }?>
				</select>
			</td>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td colspan="2" valign="bottom">
				<input placeholder="Kəlmə" class="form-control" name="q" type="text" value="{{ old('q') }}" />
			</td>
			<td>
				<input class="btn btn-success form-control" type="submit" value="Axtar" />
			</td>
		</tr>
		</tbody>
	</table>

</form>
</div>
