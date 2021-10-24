<!-- 
<div class="row mb-5">
    @if(count($patient->files) > 0)
        @foreach($patient->files as $file)
            <div class="col-md-3">
                <div class="card files" style="width: 18rem;">
                    <img class="img-fluid" src="{{url($file->path)}}">
                    <div class="card-body">
                        <h5 class="card-title">{{ str_replace(['.jpg', '.png'],'', $file->name ) }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <div id="image-viewer">
        <span class="close">&times;</span>
        <img class="modal-content" id="full-image">
    </div>		
</div>
-->

<!-- Full-width images with number and caption text -->
<div class="slideshow-container">
    @if(count($patient->files) > 0)
        @foreach($patient->files as $file)
            <div class="mySlides "> <!-- class=""mySlides fade" -->
                <div class="card files" style="width: 18rem;">
                    <img class="img-fluid" src="{{url($file->path)}}">
                    <div class="card-body">
                        <h5 class="card-title">{{ str_replace(['.jpg', '.png'],'', $file->name ) }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <div id="image-viewer">
        <span class="close">&times;</span>
        <img class="modal-content" id="full-image">
    </div>	
    <!-- Next and previous buttons 
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    -->
</div>
<br>
<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>