@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">


                <div class="panel-body">

                    <form action="{{URL::to('searchdeveloper')}}" method="post" accept-charset="utf-8">

                        {{csrf_field()}}

                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Search By email</label>
                            <div class="col-sm-4">
                                <select class="form-control itemName" style="border-bottom:2px solid #444"> </select>

                            </div>
                            &nbsp;<button type="submit" class="btn btn-info btn-sm">Search</button>
                        </div>

                        <input type="hidden" name="dev_id"  class="form-control devid">

                    </form>

                    @if(isset($msg))

                    <h3>Sorry, No Data Found</h3>

                    @endif

                    @if(isset($email))

                    <table border="1" style="width:100%">

                        <thead>
                            <tr>
                                <th>email</th>
                                <th>programming_languages</th>
                                <th>Languages</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$email}}</td>
                                <td>

                                    <ol>
                                        @foreach($pl as $p)

                                        <li> {{$p->name }}</li>

                                        @endforeach
                                    </ol>

                                </td>
                                <td>
                                    <ol>
                                        @foreach($lang as $l)

                                        <li> {{$l->code }}</li>

                                        @endforeach
                                    </ol>

                                </td>
                            </tr>
                        </tbody>
                    </table>


                    @endif


                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">


  $('.itemName').select2({
    placeholder: 'Search Developers by email....',

    ajax: {
      url: '{{URL::to("searchdev")}}',
      dataType: 'json',
      delay: 50,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {

              console.log(item);
              return {
                text: 'Name-'+ item.name +'; Email -'+ item.email,
                id: item.id


            }
        })
      };
  },
  cache: true
}
});


  var value = $('select.itemName option:selected').val();

  var test = $('.itemName');

</script>

<script>

    (function($) {
        $(document).ready(function(){

          $(".itemName").on("change", function() {
            console.log($(this).val());

            $.ajax({
                type: "GET",
                url: '{{URL::to("getuserinfo")}}',
                dataType: 'json',
                data: {title: $(this).val()},
                success: function( msg ) {
                    console.log(msg);

                    $('.devid').val(msg.id);


                }
            });



        });
      });

    })(jQuery);
</script>
@endsection
