@extends('common.layout')

<link rel="stylesheet" type="text/css" href={{URL::asset('assets/css/form.css')}}>

<script src={{URL::asset('assets/js/tinymce/js/tinymce/tinymce.min.js')}}></script>

<script type="text/javascript">


tinymce.init({
  selector: 'textarea',
  height: 500,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code jbimages'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link jbimages',
  content_css: "{{URL::asset('assets/js/tinymce/js/tinymce/themes/modern/custom_content.css')}}",
  theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
  font_size_style_values : "10px,12px,13px,14px,16px,18px,20px",
  language: "fr_FR",
  relative_urls: false,	
});
</script>
@section('content')

<div class="container">
	<div class="row">
	
		<form role="form" class="col-md-9 go-right" method="post"
			action={{URL::to('/article/'.$article_name) }} enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
			{!! csrf_field() !!}
			<div class="form-group">
				<span class="btn btn-default btn-file"> Choisir une image d'en-tête
					<input name="header_image" type="file">
				</span>
			</div>

			<div class="form-group">
				<label for="contenu">Texte de l'article:</label>
				<textarea id="contenu" name="contenu" class="form-control" >{!!$content!!}</textarea>

			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-default">Enregistrer les
					modifications</button>
			</div>

		</form>
		
	</div>
</div>

@endsection()
