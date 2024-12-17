
@if(session('success'))
          <br><br>
            <div id="success-message" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

<a href=" {{ route(name: 'inscription') }} ">Inscription</a>