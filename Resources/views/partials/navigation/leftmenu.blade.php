
<div class='panel panel-default panel-menu'>
    <div class="panel-title">
          <div class="panel-heading">
              Second Hand Shop
          </div>
    </div>
    <div class="panel-body">
        <div class='list-group'>
            <span class="dropdown-header">Company</span>
            <a class="{{ Menu::is('secondhandshop.customer.index') ? 'active' : '' }} list-group-item" href="{{ route('secondhandshop.customer.index') }}"> Alle Kunden </a>
            <a class="{{ Menu::is('secondhandshop.index') ? 'active' : '' }} list-group-item" href="{{ route('secondhandshop.index') }}"> Alle Waren </a>
            <a class="{{ Menu::is('secondhandshop.index') ? 'active' : '' }} list-group-item" href="{{ route('secondhandshop.index') }}"> Alle Quittungen </a>
            <a class="{{ Menu::is('secondhandshop.index') ? 'active' : '' }} list-group-item" href="{{ route('secondhandshop.index') }}"> Alle Kommissionen </a>
        </div>
    </div>
</div>
