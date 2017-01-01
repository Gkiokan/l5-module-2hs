
<div class='panel panel-default panel-menu'>
    <div class="panel-title">
          <div class="panel-heading">
              Second Hand Shop
          </div>
    </div>
    <div class="panel-body">
        <div class='list-group'>
            <a class="{{ Menu::is('secondhandshop.customer.index') ? 'activex' : '' }} list-group-item" href="{{ route('secondhandshop.customer.index') }}"> Kunden </a>

              <a href="{{ route('secondhandshop.customer.index') }}"
                 class="dropdown-header {{ Menu::is('secondhandshop.customer.index') ? 'active' : '' }} list-group-item">
                 <span class="glyphicon glyphicon-menu-right"></span> Alle Kunden
              </a>

              <a href="{{ route("secondhandshop.customer.search") }}"
                class="dropdown-header {{ Menu::is('secondhandshop.customer.search') ? 'active' : '' }} list-group-item">
                <span class="glyphicon glyphicon-menu-right"></span> Suche Kunde
              </a>

              <a href="{{ route("secondhandshop.customer.new") }}"
                class="dropdown-header {{ Menu::is('secondhandshop.customer.new') ? 'active' : '' }} list-group-item">
                <span class="glyphicon glyphicon-menu-right"></span> Neuen Kunden anlegen
              </a>


            <a class="{{ Menu::is('secondhandshop.index') ? 'active' : '' }} list-group-item" href="{{ route('secondhandshop.index') }}"> Alle Waren </a>
            <a class="{{ Menu::is('secondhandshop.index') ? 'active' : '' }} list-group-item" href="{{ route('secondhandshop.index') }}"> Alle Quittungen </a>
            <a class="{{ Menu::is('secondhandshop.index') ? 'active' : '' }} list-group-item" href="{{ route('secondhandshop.index') }}"> Alle Kommissionen </a>
        </div>
    </div>
</div>
