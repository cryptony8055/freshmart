        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a></p>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>



<script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>
<script src="{{asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
<script src="{{asset('assets/js/dashboard.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-toggle@2.2.2/js/bootstrap-toggle.min.js"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script>
  $(document).ready(function() {
    $(document).on('change', '#toggleCheckbox', function() {
        var productId = $(this).data('product-id');
        console.log(productId);
        var status = $(this).is(':checked');
        console.log(status);

        $.ajax({
            url: '/toggle-status/' + productId,
            type: 'POST',
            dataType: 'json',
            data: {_token: '{{ csrf_token() }}'},
            success: function(response) {
                if (response.status) {
                    $('#toggleCheckbox').prop('checked', true);
                } else {
                    $('#toggleCheckbox').prop('checked', false);
                }
            }
        });
    });
});
function addImage(){
      var cnt = parseInt($('#addMoreCount').val());
      if(cnt<5){
        var imageContentHtml = $('#imageContent').html();
        var appendImageHtml = $('#imageAppend').append(imageContentHtml);
        $(appendImageHtml).find(".change").html('<button type="button" class="btn btn-danger form-control" id="remove">Remove</button>');
        $('#addMoreCount').val(cnt+1);
      }
    }
$(document).on("click","#remove",function(){
var cnt = parseInt($('#addMoreCount').val());
$(this).parents('.pg').remove();
$('#addMoreCount').val(cnt-1);
});


</script>
</body>

</html>