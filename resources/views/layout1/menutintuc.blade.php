						<div class="navigate">
							<ul>
								<li class="{{Request::is('tintucsukienall') ? 'active':null}}"><a href="tintucsukienall">Tất cả</a></li>
								@foreach($theloai as $tl)
									@foreach($tl->loaitin as $lt)
									<li class="{{-- {{Request::is('tintucsukien/1') ? 'active':null}} --}}"><a href="tintucsukien/{{$lt->id}}">
											{{$lt->Ten}}
										</a>
									</li>
									@endforeach
								@endforeach
							</ul>
							
						</div>