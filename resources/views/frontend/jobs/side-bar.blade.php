<div class="sidebar-widget">
  <h4 class="widget-title">{{ __('Job Categories') }}</h4>
  <ul class="list-unstyled">
    <li><a href="{{ route('frontend.jobs.index', ['category' => 'it']) }}">{{ __('IT & Software') }}</a></li>
    <li><a href="{{ route('frontend.jobs.index', ['category' => 'marketing']) }}">{{ __('Marketing') }}</a></li>
    <li><a href="{{ route('frontend.jobs.index', ['category' => 'design']) }}">{{ __('Design') }}</a></li>
  </ul>
</div>
