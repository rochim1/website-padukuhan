@php($children = collect($members)->filter(fn($candidate)=>(string)($candidate['parent_id'] ?? '') === (string)$member['id'])->values())
<li class="public-org-node" role="treeitem">
  <article class="public-official-card">
    @if(!empty($member['photo']))<img src="{{ $member['photo'] }}" alt="Foto {{ $member['name'] }}">@else<span><i class="{{ $member['icon'] ?? 'ri-user-star-line' }}"></i></span>@endif
    <div><small>{{ $member['position'] }}</small><h3>{{ $member['name'] }}</h3>@if(!empty($member['description']))<p>{{ $member['description'] }}</p>@endif</div>
  </article>
  @if($children->isNotEmpty())<ul role="group">@foreach($children as $child) @include('components.org-tree-node',['member'=>$child,'members'=>$members]) @endforeach</ul>@endif
</li>
