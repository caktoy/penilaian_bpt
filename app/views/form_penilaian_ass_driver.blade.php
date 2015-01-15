<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Form Penilaian (Ass. Driver)</h3>
	</div>
	<div class="panel-body">
		<form action="" method="post" class="form-horizontal" role="form">
			<fieldset>
				<legend>Kriteria Umum</legend>
				<?php $iter = 0; ?>
				@foreach($ind_umum as $i)
				<div class="form-group">
					<label for="range{{$iter+1}}" class="col-sm-4 control-label">{{$i->NAMA_INDIKATOR}}</label>
					<div class="col-sm-8">
						<!--<input type="text" id="ind{{$iter+1}}" name="ind{{$iter+1}}" class="form-control">-->
						<input type="hidden" name="ind{{$iter+1}}" class="form-control" value="{{$i->ID_INDIKATOR}}">
						<select id="range{{$iter+1}}" name="range{{$iter+1}}" class="form-control">
							<option>-- pilih salah satu --</option>
							@foreach($range as $r)
							<option value="{{$r->ID_RANGE}}">{{$r->KET_RANGE}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<?php $iter++; ?>
				@endforeach
			</fieldset>
			@if(count($ind_khusus)>0)
			<fieldset>
				<legend>Kriteria Khusus</legend>
				@foreach($ind_khusus as $i)
				<div class="form-group">
					<label for="range{{$iter+1}}" class="col-sm-4 control-label">{{$i->NAMA_INDIKATOR}}</label>
					<div class="col-sm-8">
						<!--<input type="text" id="ind{{$iter+1}}" name="ind{{$iter+1}}" class="form-control">-->
						<input type="hidden" name="ind{{$iter+1}}" class="form-control" value="{{$i->ID_INDIKATOR}}">
						<select id="range{{$iter+1}}" name="range{{$iter+1}}" class="form-control">
							<option>-- pilih salah satu --</option>
							@foreach($range as $r)
							<option value="{{$r->ID_RANGE}}">{{$r->KET_RANGE}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<?php $iter++; ?>
				@endforeach
			</fieldset>
			@endif
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
					<input type="hidden" name="jenis" value="5">
					<input type="hidden" name="jumlah_indikator" value="<?php echo $iter; ?>">
					<button type="submit" class="btn btn-primary">Selesai</button>
					<button type="button" class="btn btn-default" onclick="kembali()">Batal</button>
				</div>
			</div>
		</form>
	</div>
</div>