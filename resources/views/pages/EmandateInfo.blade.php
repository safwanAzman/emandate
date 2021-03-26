@extends('pages.layout.app')
@section('content')



<div class="container grid px-6 mx-auto">
	<div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

		<div class="bg-blue-800 p-2 shadow text-xl text-white flex justify-between items-center">
			<h3 class="font-bold pl-2">Info E-Mandate</h3>
			<span class=" text-base pr-2 ">
				{{-- Negeri : {{ session()->get('authenticatedUser')['state_name'] }} --}}
				CAWANGAN : {{ session()->get('authenticatedUser')['branch_name'] }}
			</span>
		</div>

		<!-- table info -->
		@foreach ($INFOS as $item)
		<div class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
			<table class="md:table-auto lg:table-fixed w-full ">
				<tbody>
					<tr>
						<td class="px-4 py-4 border border-indigo-dark font-semibold">
							<div class="flex-grow">
								<div class="text-sm leading-5 text-gray-800 text-black-500">
									No Akaun: &nbsp;&nbsp; <i><input value="{{ $item->fms_acct_no }}"
											disabled=true /></i>
								</div>
							</div>
						</td>
						<td class="px-4 py-4 border border-indigo-dark font-semibold">
							<div class="flex-grow">
								<div class="text-sm leading-5 text-gray-800 text-black-500">
									Kad Pengenalan: &nbsp;&nbsp; <i><input value="{{ $item->idnum }}"
											disabled=true /></i>
								</div>
							</div>
						</td>
						</td>
					</tr>
					<tr>
						<td class="px-4 py-4 border border-indigo-dark font-semibold" colspan="2">
							<div class="flex-grow">
								<div class="text-sm leading-5 text-gray-800 text-black-500">
									Nama Usahawan: &nbsp;&nbsp; <i><input value="{{ $item->buyername }}"
											disabled=true /></i>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		@endforeach

		<!-- end table info -->

		<!-- new design -->
		<div class="flex flex-wrap" id="tabs-id">
			<div class="w-full">
				<ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
					<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
						<a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-blue-600"
							onclick="changeAtiveTab(event,'tab-1')">
							<i class="fas fa-space-shuttle text-base mr-1"></i> Maklumat Pendaftaran
						</a>
					</li>
					<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
						<a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blue-600 bg-white"
							onclick="changeAtiveTab(event,'tab-2')">
							<i class="fas fa-cog text-base mr-1"></i> Arahan Potongan
						</a>
					</li>
					<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
						<a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blue-600 bg-white"
							onclick="changeAtiveTab(event,'tab-3')">
							<i class="fas fa-briefcase text-base mr-1"></i> Status Arahan Potongan (CFT)
						</a>
					</li>
					<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
						<a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blue-600 bg-white"
							onclick="changeAtiveTab(event,'tab-4')">
							<i class="fas fa-briefcase text-base mr-1"></i> Status Sekatan Akaun
						</a>
					</li>
					<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
						<a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blue-600 bg-white"
							onclick="changeAtiveTab(event,'tab-5')">
							<i class="fas fa-briefcase text-base mr-1"></i> Rekod Transaksi
						</a>
					</li>
					<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
						<a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blue-600 bg-white"
							onclick="changeAtiveTab(event,'tab-6')">
							<i class="fas fa-briefcase text-base mr-1"></i> Rekod Pendaftaran
						</a>
					</li>
					<li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
						<a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-blue-600 bg-white"
							onclick="changeAtiveTab(event,'tab-7')">
							<i class="fas fa-briefcase text-base mr-1"></i> e-FMS
						</a>
					</li>
				</ul>
				<div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
					<div class="px-4 py-5 flex-auto">
						<div class="tab-content tab-space">
							<div class="block" id="tab-1">
								<!-- maklumat akaun -->

								@foreach ($INFOS as $item)
								<table class="w-full whitespace-no-wrap">
									<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
										<tr class="text-gray-700 dark:text-gray-400">
											<td class="border px-4 py-2">
												<div class="">
													<div>
														<table class="md:table-auto lg:table-fixed w-full ">
															<tbody>

																<tr>
																	<td
																		class="px-4 py-4 border border-indigo-dark font-semibold">
																		Nama</td>
																	<td class="px-4 py-4 border border-indigo-dark">
																		<div class="flex-grow">
																			<div
																				class="text-sm leading-5 text-gray-800">
																				<input value="{{ $item->buyername }}"
																					disabled=true
																					class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
																			</div>
																		</div>
																	</td>
																</tr>

																<tr>
																	<td
																		class="px-4 py-4 border border-indigo-dark font-semibold">
																		IC No</td>
																	<td class="px-4 py-4 border border-indigo-dark">
																		<div class="flex-grow">
																			<div
																				class="text-sm leading-5 text-gray-800">
																				<input value="{{ $item->idnum }}"
																					disabled=true
																					class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
																			</div>
																		</div>
																	</td>
																</tr>

																<tr>
																	<td
																		class="px-4 py-4 border border-indigo-dark font-semibold">
																		No Akaun<br>Pembiayaan</td>
																	<td class="px-4 py-4 border border-indigo-dark">
																		<div class="flex-grow">
																			<div
																				class="text-sm leading-5 text-gray-800">
																				<input value="{{ $item->fms_acct_no }}"
																					disabled=true
																					class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
																			</div>
																		</div>
																	</td>
											</td>
										</tr>
										<tr>
											<td class="px-4 py-4 border border-indigo-dark font-semibold">No Akaun
												Bank<br>Simpanan/Semasa</td>
											<td class="px-4 py-4 border border-indigo-dark">
												<div class="flex-grow">
													<div class="text-sm leading-5 text-gray-800">
														<input value="{{$item->buyeracct}}" disabled=true
															class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
													</div>
												</div>
											</td>
											</td>
										</tr>
										{{-- <tr>
												  <td class="px-4 py-4 border border-indigo-dark font-semibold">Status</td>
													  <td class="px-4 py-4 border border-indigo-dark">
														  <div class = "flex-grow">
															  <div class="text-sm leading-5 text-gray-800">
																  <input value = "{{ $item->status }}" disabled = true
										class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
										focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
										dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
										/>
							</div>
						</div>
						</td>
						</td>
						</tr> --}}
						</tbody>
						</table>
					</div>
					<div class="mt-4">
						<table class="md:table-auto lg:table-fixed table-auto w-full">
							<tbody>
								{{-- <tr>
												<td class="px-4 py-4 border border-indigo-dark font-semibold">Jumlah Pinjaman</td>
													<td class="px-4 py-4 border border-indigo-dark">
														<div class = "flex-grow">
															<div class="text-sm leading-5 text-gray-800">
																<input value = "RM{{number_format($item->approved_limit,0)}}" disabled = true
								class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
								focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
								dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
								/>
					</div>
				</div>
				</td>
				</td>
				</tr> --}}
				{{-- <tr>
												  <td class="px-4 py-4 border border-indigo-dark font-semibold">Amaun Debit</td>
													  <td class="px-4 py-4 border border-indigo-dark">
														  <div class = "flex-grow">
															  <div class="text-sm leading-5 text-gray-800">
																  <input value = "RM{{number_format($item->debitamt,0) }}" disabled = true
				class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
				focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray
				form-input"
				/>
			</div>
		</div>
		</td>
		</td>
		</tr> --}}
		<tr>
			<td class="px-4 py-4 border border-indigo-dark font-semibold">Skim</td>
			<td class="px-4 py-4 border border-indigo-dark">
				<div class="flex-grow">
					<div class="text-sm leading-5 text-gray-800">
						<input value="{{ $item->purpose }}" disabled=true
							class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
					</div>
				</div>
			</td>
			</td>
		</tr>
		<tr>
			<td class="px-4 py-4 border border-indigo-dark font-semibold">Jumlah Arahan Debit</td>
			<td class="px-4 py-4 border border-indigo-dark">
				<div class="flex-grow">
					<div class="text-sm leading-5 text-gray-800">
						<input value="RM{{ $item->instal_amt }}" disabled=true
							class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
					</div>
				</div>
			</td>
			</td>
		</tr>
		<tr>
			<td class="px-4 py-4 border border-indigo-dark font-semibold">Bilangan Kekerapan</td>
			<td class="px-4 py-4 border border-indigo-dark">
				<div class="flex-grow">
					<div class="text-sm leading-5 text-gray-800">
						<input value="{{ number_format($item->freqnum) }}" disabled=true
							class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
					</div>
				</div>
			</td>
			</td>
		</tr>
		<tr>
			<td class="px-4 py-4 border border-indigo-dark font-semibold">No Telefon</td>
			<td class="px-4 py-4 border border-indigo-dark">
				<div class="flex-grow">
					<div class="text-sm leading-5 text-gray-800">
						<input value="{{ $item->telno }}" disabled=true
							class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
					</div>
				</div>
			</td>
		</tr>
		</tr>
		{{-- <tr>
												  <td class="px-4 py-4 border border-indigo-dark font-semibold">Mod Kekerapan</td>
													  <td class="px-4 py-4 border border-indigo-dark">
														  <div class = "flex-grow">
															  <div class="text-sm leading-5 text-gray-800">
																  <input value = "{{ $item->freqmode }}" disabled = true
		class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
		focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
		/>
	</div>
</div>
</td>
</td>
</tr> --}}
{{-- <tr>
												  <td class="px-4 py-4 border border-indigo-dark font-semibold">Tarikh Mula</td>
													  <td class="px-4 py-4 border border-indigo-dark">
														  <div class = "flex-grow">
															  <div class="text-sm leading-5 text-gray-800">
																  <input value = "{{ date('d-m-Y',strtotime($item->effdate)) }}" disabled = true
class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none
focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
/>
</div>
</div>
</td>
</td>
</tr> --}}

{{-- <tr>
												  <td class="px-4 py-4 border border-indigo-dark font-semibold">Tarikh Tamat</td>
													  <td class="px-4 py-4 border border-indigo-dark">
														  <div class = "flex-grow">
															  <div class="text-sm leading-5 text-gray-800">
																  <input value = "{{ date('d-m-Y',strtotime($item->expdate)) }}" disabled = true
class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none
focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
/>
</div>
</div>
</td>
</td>
</tr> --}}

{{-- <tr>
												  <td class="px-4 py-4 border border-indigo-dark font-semibold">Tarikh Lulus</td>
													  <td class="px-4 py-4 border border-indigo-dark">
														  <div class = "flex-grow">
															  <div class="text-sm leading-5 text-gray-800">
																  <input value = "{{ date('d-m-Y',strtotime($item->appdate)) }}" disabled = true
class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none
focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
/>
</div>
</div>
</td>
</td>
</tr> --}}
</tbody>
</table>
</div>
</div>
</td>
</tr>
</tbody>
</table>
@endforeach

<!-- end maklumat kaun -->
</div>
<div class="hidden" id="tab-2">
	<!-- arahan potongan -->
	@foreach ($INFOS as $item)
	<table class="w-full whitespace-no-wrap">
		<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
			<tr class="text-gray-700 dark:text-gray-400">
				<td class="border px-4 py-2">
					<div>
						<table class="table-auto w-full">
							<tbody>
								<tr>
									<td class="px-4 py-4 border border-indigo-dark font-semibold">Tarikh Berjaya Daftar
									</td>
									<td class="px-4 py-4 border border-indigo-dark">
										<div class="flex-grow">
											<div class="text-sm leading-5 text-gray-800">
												<input value="{{ isset($item->appdate) ? date('d-m-Y',strtotime($item->appdate)):'' }}"
													disabled=true
													class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
											</div>
										</div>
									</td>

								</tr>

								<tr>
									<td class="px-4 py-4 border border-indigo-dark font-semibold">Rujukan RHB-DDA Form
									</td>
									<td class="px-4 py-4 border border-indigo-dark">
										<div class="flex-grow">
											<div class="text-sm leading-5 text-gray-800">
												<input value="{{ $item->recnum }}" disabled=true
													class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
											</div>
										</div>
									</td>
				</td>
			</tr>

			<tr>
				<td class="px-4 py-4 border border-indigo-dark font-semibold">Tarikh Mula Arahan Potongan </td>
				<td class="px-4 py-4 border border-indigo-dark">
					<div class="flex-grow">
						<div class="text-sm leading-5 text-gray-800">
							<input value="{{ isset($item->effdate) ? date('d-m-Y',strtotime($item->effdate)):'' }} " disabled=true
								class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
						</div>
					</div>

				</td>
				</td>
			</tr>

			<tr>
				<td class="px-4 py-4 border border-indigo-dark font-semibold">Tarikh Akhir Arahan Potongan </td>
				<td class="px-4 py-4 border border-indigo-dark">
					<div class="flex-grow">
						<div class="text-sm leading-5 text-gray-800">
							<input value="{{ isset($item->expdate) ? date('d-m-Y',strtotime($item->expdate)):'' }} " disabled=true
								class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
						</div>
					</div>

				</td>
				</td>
			</tr>

			{{-- <tr>
													<td class="px-4 py-4 border border-indigo-dark font-semibold">Amaun Potongan Bulanan </td>
														<td class="px-4 py-4 border border-indigo-dark">
															<div class = "flex-grow">
																<div class="text-sm leading-5 text-gray-800">
																	<input value = "RM{{ $item->instal_amt }}" disabled = true
			class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
			focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
			/>
</div>
</div>
</td>
</td>
</tr> --}}

</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>
@endforeach
<!-- end arahan potongan -->
</div>
<div class="hidden" id="tab-3">
	<!-- status arahan potongan -->
	@foreach ($INFOS as $item)
	<table class="w-full whitespace-no-wrap">
		<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
			<tr class="text-gray-700 dark:text-gray-400">
				<td class="border px-4 py-2">
					<div>
						<table class="table-auto w-full">
							<tbody>
								<tr>
									<td class="px-4 py-4 border border-indigo-dark font-semibold">Tarikh Terakhir Arahan
										Potongan</td>
									<td class="px-4 py-4 border border-indigo-dark">
										<div class="flex-grow">
											<div class="text-sm leading-5 text-gray-800">
												<input value="{{ isset($item->lastcycle_date) ? date('d-m-Y',strtotime($item->lastcycle_date)):'' }}"
													disabled=true
													class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
											</div>
										</div>
									</td>

								</tr>

								<tr>
									<td class="px-4 py-4 border border-indigo-dark font-semibold">Tarikh Berikutnya
										Arahan Potongan</td>
									<td class="px-4 py-4 border border-indigo-dark">
										<div class="flex-grow">
											<div class="text-sm leading-5 text-gray-800">
												<input value="{{ isset($item->lastcycle_date) ? date('d-m-Y',strtotime($item->nextcycle_date)):'' }}"
													disabled=true
													class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
											</div>
										</div>
									</td>
				</td>
			</tr>

			<tr>
				<td class="px-4 py-4 border border-indigo-dark font-semibold">Amaun Potongan</td>
				<td class="px-4 py-4 border border-indigo-dark">
					<div class="flex-grow">
						<div class="text-sm leading-5 text-gray-800">
							<input value="RM{{ $item->instal_amt }}" disabled=true
								class="block w-70 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
						</div>
					</div>

				</td>
				</td>
			</tr>

			<tr>
				<td class="px-4 py-4 border border-indigo-dark font-semibold">Bilangan Bulan <br>Gagal Potongan </td>
				<td class="px-4 py-4 border border-indigo-dark">
					<div class="flex-grow">
						<div class="text-sm leading-5 text-gray-800">
							<input value="{{ $item->blockpayment_flag }} Bulan" disabled=true
								class="block w-70 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
						</div>
					</div>

				</td>
				</td>
			</tr>

		</tbody>
	</table>
</div>
</td>
</tr>
</tbody>
</table>
@endforeach
<!-- end status arahan potongan -->
</div>
<div class="hidden" id="tab-4">
	<!--sekatan akaun-->
	@foreach ($INFOS as $item)
	<table class="w-full whitespace-no-wrap">
		<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
			<tr class="text-gray-700 dark:text-gray-400">
				<td class="border px-4 py-2">
					<div>
						<table class="table-auto w-full">
							@if(session()->has('activestatus'))
							<div class="p-4">

								<x-general.alert.base
									class="bg-green-200 border-2 border-green-300 rounded-md p-2 text-sm my-2">
									<x-slot name="message">{{ session()->get('activestatus') }}</x-slot>
								</x-general.alert.base>
								@endif

								<tbody>
									<tr>
										<td class="px-2 py-2 border border-indigo-dark font-semibold">Kod :
											{{ $item->blocked_paymnt_status }}
										</td>
										<td class="px-6 py-6 border border-indigo-dark font-semibold">Status :
											{{ $item->status_desc }}
										</td>
										<td class="px-6 py-6 border border-indigo-dark font-semibold">Dikemaskini Oleh :
											{{ $item->blockedby }}
										</td>
										<td class="px-1 py-1 border border-indigo-dark">
											<div class="flex">
												<div class="pt-2">
													<label for="action">

													</label>
													<form method="post"
														action="{{ route('EmandateInfo.activestatus') }}">
														@csrf
														<input type="hidden" name="itemid" value="{{ $item->idnum }}">
														@if (session('authenticatedUser')['branch_code'] == '0009' ||
														session('authenticatedUser')['branch_code'] == '0004' ||
														session('authenticatedUser')['branch_code'] == '0016')
														@if ($item->code_blocked == '02')

														<select class="form-control" id="action" name="action" disabled>
															{{-- <option selected>PLEASE CHOOSE</option> --}}
															<option value=""
																{{$item->blocked_paymnt_status == null ? 'selected':''}}>
																SILA PILIH</option>
															<option value="0"
																{{$item->blocked_paymnt_status == 0 ? 'selected':''}}>
																RE-ACTIVE</option>
															<option value="1"
																{{$item->blocked_paymnt_status == 1 ? 'selected':''}}>
																ON-HOLD</option>
															{{-- {{dd($item->blocked_paymnt_status)}} --}}
														</select>

														<!-- start modal -->
														<div x-data="{ show: false }">
															<div class="flex justify-center">
																<button @click={show=true} type="button"
																	class="leading-tight bg-blue-500 text-gray-200 rounded px-6 py-2 text-sm focus:outline-none focus:border-white"
																	hidden>Tindakan</Button>
															</div>
															<div x-show="show" tabindex="0"
																class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
																<div @click.away="show = false"
																	class="z-50 relative p-3 mx-auto my-0 max-w-full"
																	style="width: 600px; margin-top:315px">
																	<div
																		class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
																		{{-- <button @click={show=false} class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold"></button>  <!--&times;--> --}}
																		<div
																			class="px-6 py-3 text-xl border-b font-bold">
																			Ulasan/Keterangan</div>
																		<div class="p-6 flex-grow">
																			<!-- text area -->
																			<label class="block">
																				<textarea
																					class="form-textarea mt-1 block w-full"
																					rows="3"
																					placeholder="Ulasan Tidak boleh melebihi 100 patah perkataan. @error('reasons') is-invalid @enderror"
																					name="reasons" maxlength="100"
																					required>{{ old('reasons') }}</textarea>
																			</label>
																			<!-- end text area -->
																		</div>
																		<div class="px-6 py-3 border-t">
																			<div
																				class="flex justify-end src=your-loader-url">
																				<button @click={show=false}
																					type="button"
																					class="bg-gray-700 text-gray-100 rounded px-4 py-2 mr-1">Tutup</Button>
																				<button @click={show=true} type="sumbit"
																					class="bg-blue-600 text-gray-200 rounded px-4 py-2">Simpan</Button>
																			</div>
																		</div>
																	</div>
																</div>
																<div
																	class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50">
																</div>
															</div>
														</div>
														<!-- end modal -->
														@else
														{{-- {{dump($item->blocked_paymnt_status)}} --}}
														<select class="form-control" id="action" name="action">

															{{-- <option selected>PLEASE CHOOSE</option> --}}
															<option value="99"
																{{$item->blocked_paymnt_status == null ? 'selected':''}}
																disabled>SILA PILIH</option>
															<option value="0"
																{{$item->blocked_paymnt_status == 0 and $item->blocked_paymnt_status != null  ? 'selected':''}}>
																RE-ACTIVE</option>
															<option value="1"
																{{$item->blocked_paymnt_status == 1 and $item->blocked_paymnt_status != null  ? 'selected':''}}>
																ON-HOLD</option>
														</select>
														<!-- start modal -->
														<div x-data="{ show: false }">
															<div class="flex justify-center">
																<button @click={show=true} type="button"
																	class="leading-tight bg-blue-500 text-gray-200 rounded px-6 py-2 text-sm focus:outline-none focus:border-white">Tindakan</Button>
															</div>
															<div x-show="show" tabindex="0"
																class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
																<div @click.away="show = false"
																	class="z-50 relative p-3 mx-auto my-0 max-w-full"
																	style="width: 600px; margin-top:315px">
																	<div
																		class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
																		{{-- <button @click={show=false} class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold"></button>  <!--&times;--> --}}
																		<div
																			class="px-6 py-3 text-xl border-b font-bold">
																			Ulasan/Keterangan</div>
																		<div class="p-6 flex-grow">
																			<!-- text area -->
																			<label class="block">
																				<textarea
																					class="form-textarea mt-1 block w-full"
																					rows="3"
																					placeholder="Ulasan Tidak boleh melebihi 100 patah perkataan. @error('reasons') is-invalid @enderror"
																					name="reasons" maxlength="100"
																					required>{{ old('reasons') }}</textarea>
																			</label>
																			<!-- end text area -->
																		</div>
																		<div class="px-6 py-3 border-t">
																			<div
																				class="flex justify-end src=your-loader-url">
																				<button @click={show=false}
																					type="button"
																					class="bg-gray-700 text-gray-100 rounded px-4 py-2 mr-1">Tutup</Button>
																				<button @click={show=true} type="sumbit"
																					class="bg-blue-600 text-gray-200 rounded px-4 py-2">Simpan</Button>
																			</div>
																		</div>
																	</div>
																</div>
																<div
																	class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50">
																</div>
															</div>
														</div>
														<!-- end modal -->
														@endif
														<div class="pl-2">
															@endif
													</form>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td class="px-2 py-2 border border-indigo-dark font-semibold">Ulasan/Keterangan:
										</td>
										<td colspan="3" class="px-6 py-6 border border-indigo-dark font-semibold">
											<textarea class="form-textarea mt-1 block w-full" rows="3"
												disabled>{{ $item->reasons }}</textarea>
										</td>
									</tr>
								</tbody>

						</table>
					</div>
</div>
</td>
</tr>
</tbody>
</table>
@endforeach
<!-- end sekatan akaun -->
</div>
<div class="hidden" id="tab-5">
	<!-- rekod transaksi -->
	@foreach ($INFOS as $item)
	<div
		class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
		<table class="min-w-full">
			<thead>
				<tr>
					<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
						Rujukan Fail RES</th>
					<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
						Mod Bayaran</th>
					<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
						Tarikh Potongan</th>
					<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
						BankID</th>
					{{-- <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Matawang</th> --}}
					<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
						Amaun(RM)</th>
					{{-- <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Bil Percubaan Bulanan</th> --}}
					<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
						Kod Status</th>
					<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
						Status</th>
				</tr>
			</thead>
			<tbody class="bg-white">
				@foreach ($filelist_res as $item)
				<tr>
					<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
						<div class="flex items-center">
							<div>
								<div class="text-sm leading-5 text-gray-800">

									{{ $item->filename }}

								</div>
							</div>
						</div>
					</td>

					<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
						<div class="flex items-center">
							<div>
								<div class="text-sm leading-5 text-gray-800">

									{{ $item->hmode }}

								</div>
							</div>
						</div>
					</td>

					<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
						<div class="flex items-center">
							<div>
								<div class="text-sm leading-5 text-gray-800">

									{{-- {{ substr($item->hdate,0,2).'/'.substr($item->hdate,2,2).'/'.substr($item->hdate,4,4) }}
									--}}
									{{ isset($item->hdate) ? ($item->hdate):'' }}

								</div>
							</div>
						</div>
					</td>

					<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
						<div class="flex items-center">
							<div>
								<div class="text-sm leading-5 text-gray-800">

									{{ $item->bankid }}

								</div>
							</div>
						</div>
					</td>

					{{-- <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
						<div class="flex items-center">
							<div>
								<div class="text-sm leading-5 text-gray-800">
		
								  {{ $item->trancurr }}

	</div>
</div>
</div>
</td> --}}

<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
	<div class="flex items-center">
		<div>
			<div class="text-sm leading-5 text-gray-800">

				{{ $item->tranamt }}

			</div>
		</div>
	</div>
</td>
{{-- @foreach ($INFOS as $item)
				  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
					<div class="flex items-center">
						<div>
							<div class="text-sm leading-5 text-gray-800">
	
							  {{ $item->failed_count_mon }}

</div>
</div>
</div>
</td>
@endforeach --}}
<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
	<div class="flex items-center">
		<div>
			<div class="text-sm leading-5 text-gray-800">

				R{{ $item->status }}

			</div>
		</div>
	</div>
</td>
<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
	<div class="flex items-center">
		<div>
			<div class="text-sm leading-5 text-gray-800">

				{{ SUBSTR($item->status_desc,0,30) }}

			</div>
		</div>
	</div>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endforeach
<!-- end rekod transaksi -->
</div>
<div class="hidden" id="tab-6">
	<!-- rekod pendaftaran -->
	@foreach ($INFOS as $item)

	<table class="w-full whitespace-no-wrap">
		<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
			<tr class="text-gray-700 dark:text-gray-400">
				<td class="border px-4 py-2">
					<div>
						<table class="table-auto w-full border">
							<thead>
								<tr
									class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 p-5">
									<th class=" px-4 py-3 text-left text-grey-dark border-indigo-dark font-semibold">No
										Rekod</th>
									<th class=" px-4 py-3 text-left text-grey-dark border-indigo-dark font-semibold">
										Tarikh Berjaya Daftar</th>
									<th class=" px-4 py-3 text-left text-grey-dark border-indigo-dark font-semibold">
										Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="px-4 py-4 border border-indigo-dark">{{ $item->recnum }}</td>
									<td class="px-4 py-4 border border-indigo-dark">
										{{ isset($item->effdate) ? date('d-m-Y',strtotime($item->effdate)):'' }}</td>
									<td class="px-4 py-4 border border-indigo-dark">{{ $item->approved_desc }}</td>
									{{-- <td class="px-4 py-4 border border-indigo-dark">{{ $item->approval }}
				</td> --}}
			</tr>
		</tbody>
	</table>
</div>
</td>
</tr>
</tbody>
</table>
@endforeach
<!-- end rekod pendaftaran -->
</div>

<div class="hidden" id="tab-7">
	@if(empty($data))
	{{-- <h1>Empty</h1> --}}
	@else
	<!-- efms kedudukan akaun -->

	<!--  tabs for efms  ******************************************************************************************************************************-->
	<div class="rounded border w-full mx-auto mt-4">
		<!-- Tabs -->
		<ul id="tabs" class="inline-flex pt-2 px-1 w-full border-b">
			<li class="bg-white px-4 text-gray-800 font-semibold py-2 rounded-t border-t border-r border-l -mb-px"><a
					id="default-tab" href="#1" style="font-size:16px">Kedudukan Akaun</a>
			</li>
			<li class="px-4 text-gray-800 font-semibold py-2 rounded-t"><a href="#2" style="font-size:16px">Rekod
					Bayaran Balik</a>
			</li>
		</ul>
		<!-- Tab Contents -->
		<div id="tab-contents">
			<div id="1" class="p-4">
				<div class="font-sans bg-grey-lighter flex flex-col min-h-screen w-full">
					<div class="flex-grow container mx-auto sm:px-4 pt-6 pb-8">

						<div class="hidden lg:flex">
							<!-- amaun keseluruhan content -->
							<div class="w-full mb-6 lg:mb-0 lg:w-1/2 px-4 flex flex-col">
								<div
									class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
									<div class="border-b">

										<div class="bg-blue-800 p-2 shadow text-xl text-white">
											<h3 class="font-bold pl-2" style="font-size:16px"> Amaun Keseluruhan </h3>
										</div>
										<div class="flex">

										</div>

									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											Tempoh Pembiayaan
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">

											{{$data[0]->duration}} Bulan

										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">

											{{number_format($data[0]->profit_rate,2)}} % Setahun

										</div>
									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											Amaun Pengeluaran
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											RM{{number_format($data[0]->disbursed_amount,2)}}
										</div>
										<div class="flex w-3/5 md:w/12">
											<div class="w-1/2 px-4">
												<div class="text-right">

												</div>
											</div>
										</div>
									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											Caj Keseluruhan
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											RM{{number_format($data[0]->tot_profit_unearned,2)}}
										</div>
										<div class="flex w-3/5 md:w/12">
											<div class="w-1/2 px-4">
												<div class="text-right">

												</div>
											</div>
										</div>
									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											Simpanan Keseluruhan
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											RM{{number_format($data[0]->savings_to_paid,2)}}
										</div>
										<div class="flex w-3/5 md:w/12">
											<div class="w-1/2 px-4">
												<div class="text-right">

												</div>
											</div>
										</div>
									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											Jumlah Keseluruhan
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											RM{{number_format($data[0]->total,2)}}
										</div>
										<div class="flex w-3/5 md:w/12">
											<div class="w-1/2 px-4">
												<div class="text-right">

												</div>
											</div>
										</div>
									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											Baki Belum dikeluarkan
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											RM{{number_format($data[0]->undrawn_amount,2)}}
										</div>
										<div class="flex w-3/5 md:w/12">
											<div class="w-1/2 px-4">
												<div class="text-right">

												</div>
											</div>
										</div>
									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											Tarikh Mula & Akhir Bayar
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											{{isset($data[0]->start_instal_date) ? date("d-m-Y", strtotime(substr($data[0]->start_instal_date,0,10))):''}}
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											{{isset($data[0]->expiry_date) ? date("d-m-Y", strtotime(substr($data[0]->expiry_date,0,10))):''}}
										</div>
									</div>
								</div>
							</div>
							<!-- end amaun keseluruhan content-->
							<!-- kedudukan terkini -->
							<div class="w-full mb-6 lg:mb-0 lg:w-1/2 px-4 flex flex-col">
								<div
									class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
									<div class="border-b">

										<div class="bg-blue-800 p-2 shadow text-xl text-white">
											<h3 class="font-bold pl-2" style="font-size:16px"> Kedudukan Terkini </h3>
										</div>
										<div class="flex">
										</div>

									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="bg-orange h-2 rounded-full flex-grow mr-2"></div>

										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">

											Telah Dibayar
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">

											Belum Dibayar
										</div>
									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="rounded-full bg-grey inline-flex mr-3">
												<svg class="fill-current text-white h-8 w-8 block"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38">
													<g fill-rule="evenodd">
														<path
															d="M12.29 28.04l1.29-5.52-1.58.67.63-2.85 1.64-.68L16.52 10h5.23l-1.52 7.14 2.09-.74-.58 2.7-2.05.8-.9 4.34h8.1l-.99 3.8z">
														</path>
													</g>
												</svg>
											</div>
											Amaun Pokok
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="bg-grey h-2 w-2 rounded-full mr-2"></div>
											RM{{NUMBER_FORMAT($data[0]->amaun_pokok,2)}}
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="bg-grey h-2 w-2 rounded-full mr-2"></div>
											RM{{NUMBER_FORMAT($data[0]->cost_outstanding,2)}}
										</div>

									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="rounded-full bg-grey inline-flex mr-3">
												<svg class="fill-current text-white h-8 w-8 block"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38">
													<g fill-rule="evenodd">
														<path
															d="M12.29 28.04l1.29-5.52-1.58.67.63-2.85 1.64-.68L16.52 10h5.23l-1.52 7.14 2.09-.74-.58 2.7-2.05.8-.9 4.34h8.1l-.99 3.8z">
														</path>
													</g>
												</svg>
											</div>
											Amaun Caj
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="bg-indigo h-2 w-2 rounded-full mr-2"></div>
											RM{{NUMBER_FORMAT($data[0]->tot_profit_earned,2)}}
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="bg-indigo h-2 w-2 rounded-full mr-2"></div>
											RM{{NUMBER_FORMAT($data[0]->uei_outstanding,2)}}
										</div>

									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="rounded-full bg-grey inline-flex mr-3">
												<svg class="fill-current text-white h-8 w-8 block"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38">
													<g fill-rule="evenodd">
														<path
															d="M12.29 28.04l1.29-5.52-1.58.67.63-2.85 1.64-.68L16.52 10h5.23l-1.52 7.14 2.09-.74-.58 2.7-2.05.8-.9 4.34h8.1l-.99 3.8z">
														</path>
													</g>
												</svg>
											</div>
											Baki Pembiayaan (P+C)
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="bg-indigo h-2 w-2 rounded-full mr-2"></div>
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="bg-indigo h-2 w-2 rounded-full mr-2"></div>
											RM{{NUMBER_FORMAT($data[0]->bal_outstanding,2)}}
										</div>
									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="rounded-full bg-indigo inline-flex mr-3">
												<svg class="fill-current text-white h-8 w-8 block"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
													<g fill-rule="evenodd">
														<path
															d="M10.13 17.76c-.1-.15-.06-.2.09-.12l5.49 3.09c.15.08.4.08.56 0l5.58-3.08c.16-.08.2-.03.1.11L16.2 25.9c-.1.15-.28.15-.38 0l-5.7-8.13zm.04-2.03a.3.3 0 0 1-.13-.42l5.74-9.2c.1-.15.25-.15.34 0l5.77 9.19c.1.14.05.33-.12.41l-5.5 2.78a.73.73 0 0 1-.6 0l-5.5-2.76z">
														</path>
													</g>
												</svg>
											</div>
											Amaun Rebat
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="bg-indigo h-2 w-2 rounded-full mr-2"></div>

										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="bg-indigo h-2 w-2 rounded-full mr-2"></div>
											RM{{NUMBER_FORMAT($data[0]->rebate_amount,2)}}
										</div>
									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="rounded-full bg-indigo inline-flex mr-3">
												<svg class="fill-current text-white h-8 w-8 block"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
													<g fill-rule="evenodd">
														<path
															d="M10.13 17.76c-.1-.15-.06-.2.09-.12l5.49 3.09c.15.08.4.08.56 0l5.58-3.08c.16-.08.2-.03.1.11L16.2 25.9c-.1.15-.28.15-.38 0l-5.7-8.13zm.04-2.03a.3.3 0 0 1-.13-.42l5.74-9.2c.1-.15.25-.15.34 0l5.77 9.19c.1.14.05.33-.12.41l-5.5 2.78a.73.73 0 0 1-.6 0l-5.5-2.76z">
														</path>
													</g>
												</svg>
											</div>
											Jumlah Simpanan
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="bg-indigo h-2 w-2 rounded-full mr-2"></div>

										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="bg-indigo h-2 w-2 rounded-full mr-2"></div>
											RM{{NUMBER_FORMAT($data[0]->savings_balance,2)}}
										</div>
									</div>

								</div>
							</div>

							<!-- END Kedudukan terkini -->
						</div>

						<br>

						<div class="hidden lg:flex">
							<!-- Status Kredit | NPL -->
							<div class="w-full mb-6 lg:mb-0 lg:w-1/2 px-4 flex flex-col">
								<div
									class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
									<div class="border-b">

										<div class="bg-blue-800 p-2 shadow text-xl text-white">
											<h3 class="font-bold pl-2" style="font-size:16px"> Status Kredit | NPL </h3>
										</div>
										<div class="flex">

										</div>

									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-4 flex items-center">
											<div class="rounded-full bg-orange inline-flex mr-3">
												<svg class="fill-current text-white h-8 w-8 block"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
													<g fill-rule="evenodd">
														<path
															d="M21.78 15.37c.51-.61.83-1.4.83-2.26 0-2.74-1.6-4.38-4.24-4.38V5.45c0-.12-.1-.22-.22-.22h-1.27c-.11 0-.2.1-.2.21v3.3h-1.7V5.44c0-.12-.1-.22-.22-.22H13.5c-.12 0-.2.1-.21.21v3.3H9.67c-.12 0-.21.09-.21.21v1.31c0 .12.1.22.21.22h.21c.94 0 1.7.79 1.7 1.75v7c0 .92-.68 1.67-1.55 1.75a.21.21 0 0 0-.18.16l-.33 1.32c-.01.06 0 .13.04.19.04.05.1.08.17.08h3.55v3.3c0 .1.1.2.2.2h1.28c.12 0 .21-.1.21-.22v-3.28h1.7v3.3c0 .1.1.2.21.2h1.27c.12 0 .22-.1.22-.22v-3.28h.85c2.65 0 4.24-1.64 4.24-4.37 0-1.28-.68-2.39-1.68-3zm-6.8-4.01h2.54c.94 0 1.7.78 1.7 1.75 0 .96-.76 1.75-1.7 1.75h-2.55v-3.5zm3.39 8.75h-3.4v-3.5h3.4c.93 0 1.7.78 1.7 1.75 0 .96-.77 1.75-1.7 1.75z">
														</path>
													</g>
												</svg>
											</div>
											<span class="text-lg"> </span>
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											Status
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											Telah Berlaku
										</div>
									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="rounded-full bg-grey inline-flex mr-3">
												<svg class="fill-current text-white h-8 w-8 block"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38">
													<g fill-rule="evenodd">
														<path
															d="M12.29 28.04l1.29-5.52-1.58.67.63-2.85 1.64-.68L16.52 10h5.23l-1.52 7.14 2.09-.74-.58 2.7-2.05.8-.9 4.34h8.1l-.99 3.8z">
														</path>
													</g>
												</svg>
											</div>
											Status Kredit
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											{{$data[0]->credit_status}}
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											{{ isset($data[0]->credit_status_chgdate) ? date("d-m-Y", strtotime(substr($data[0]->credit_status_chgdate,0,10))):''}}
										</div>
									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="rounded-full bg-indigo inline-flex mr-3">
												<svg class="fill-current text-white h-8 w-8 block"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
													<g fill-rule="evenodd">
														<path
															d="M10.13 17.76c-.1-.15-.06-.2.09-.12l5.49 3.09c.15.08.4.08.56 0l5.58-3.08c.16-.08.2-.03.1.11L16.2 25.9c-.1.15-.28.15-.38 0l-5.7-8.13zm.04-2.03a.3.3 0 0 1-.13-.42l5.74-9.2c.1-.15.25-.15.34 0l5.77 9.19c.1.14.05.33-.12.41l-5.5 2.78a.73.73 0 0 1-.6 0l-5.5-2.76z">
														</path>
													</g>
												</svg>
											</div>
											Status NPL
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											{{$data[0]->npf_status}}
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											{{isset($data[0]->npf_changed_date) ? date("d-m-Y", strtotime(SUBSTR($data[0]->npf_changed_date,0,10))):''}}
										</div>
									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="rounded-full bg-indigo inline-flex mr-3">
												<svg class="fill-current text-white h-8 w-8 block"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
													<g fill-rule="evenodd">
														<path
															d="M10.13 17.76c-.1-.15-.06-.2.09-.12l5.49 3.09c.15.08.4.08.56 0l5.58-3.08c.16-.08.2-.03.1.11L16.2 25.9c-.1.15-.28.15-.38 0l-5.7-8.13zm.04-2.03a.3.3 0 0 1-.13-.42l5.74-9.2c.1-.15.25-.15.34 0l5.77 9.19c.1.14.05.33-.12.41l-5.5 2.78a.73.73 0 0 1-.6 0l-5.5-2.76z">
														</path>
													</g>
												</svg>
											</div>
											Tunggakan
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											RM{{NUMBER_FORMAT($data[0]->instal_arrears,2)}}
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											{{$data[0]->instal_mode}}&nbspKali Bayaran
										</div>
									</div>
								</div>
							</div>
							<!-- end Status Kredit | NPL-->
							<!-- Owings -->
							<div class="w-full mb-6 lg:mb-0 lg:w-1/2 px-4 flex flex-col">
								<div
									class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
									<div class="border-b">
										<div class="bg-blue-800 p-2 shadow text-xl text-white">
											<h3 class="font-bold pl-2" style="font-size:16px"> Owings </h3>
										</div>
										<div class="flex">
										</div>
									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="rounded-full bg-orange inline-flex mr-3">
												<svg class="fill-current text-white h-8 w-8 block"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
													<g fill-rule="evenodd">
														<path
															d="M21.78 15.37c.51-.61.83-1.4.83-2.26 0-2.74-1.6-4.38-4.24-4.38V5.45c0-.12-.1-.22-.22-.22h-1.27c-.11 0-.2.1-.2.21v3.3h-1.7V5.44c0-.12-.1-.22-.22-.22H13.5c-.12 0-.2.1-.21.21v3.3H9.67c-.12 0-.21.09-.21.21v1.31c0 .12.1.22.21.22h.21c.94 0 1.7.79 1.7 1.75v7c0 .92-.68 1.67-1.55 1.75a.21.21 0 0 0-.18.16l-.33 1.32c-.01.06 0 .13.04.19.04.05.1.08.17.08h3.55v3.3c0 .1.1.2.2.2h1.28c.12 0 .21-.1.21-.22v-3.28h1.7v3.3c0 .1.1.2.21.2h1.27c.12 0 .22-.1.22-.22v-3.28h.85c2.65 0 4.24-1.64 4.24-4.37 0-1.28-.68-2.39-1.68-3zm-6.8-4.01h2.54c.94 0 1.7.78 1.7 1.75 0 .96-.76 1.75-1.7 1.75h-2.55v-3.5zm3.39 8.75h-3.4v-3.5h3.4c.93 0 1.7.78 1.7 1.75 0 .96-.77 1.75-1.7 1.75z">
														</path>
													</g>
												</svg>
											</div>
											Jumlah Owings
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											RM{{NUMBER_FORMAT($data[0]->total_owings,2)}}
										</div>
									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="rounded-full bg-grey inline-flex mr-3">
												<svg class="fill-current text-white h-8 w-8 block"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38">
													<g fill-rule="evenodd">
														<path
															d="M12.29 28.04l1.29-5.52-1.58.67.63-2.85 1.64-.68L16.52 10h5.23l-1.52 7.14 2.09-.74-.58 2.7-2.05.8-.9 4.34h8.1l-.99 3.8z">
														</path>
													</g>
												</svg>
											</div>
											Owing Telah Dibayar
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">

										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											RM{{NUMBER_FORMAT($data[0]->owings_paid,2)}}
										</div>
									</div>
									<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											<div class="rounded-full bg-indigo inline-flex mr-3">
												<svg class="fill-current text-white h-8 w-8 block"
													xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
													<g fill-rule="evenodd">
														<path
															d="M10.13 17.76c-.1-.15-.06-.2.09-.12l5.49 3.09c.15.08.4.08.56 0l5.58-3.08c.16-.08.2-.03.1.11L16.2 25.9c-.1.15-.28.15-.38 0l-5.7-8.13zm.04-2.03a.3.3 0 0 1-.13-.42l5.74-9.2c.1-.15.25-.15.34 0l5.77 9.19c.1.14.05.33-.12.41l-5.5 2.78a.73.73 0 0 1-.6 0l-5.5-2.76z">
														</path>
													</g>
												</svg>
											</div>
											Baki Owings
										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">

										</div>
										<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
											RM{{NUMBER_FORMAT($data[0]->owing_amt,2)}}
										</div>
									</div>
								</div>
							</div>
							<!-- END Owings -->
						</div>
						<BR>
						<!-- BUTIRAN -->
						<div class="w-full mb-6 lg:mb-0 lg:w-full px-4 flex flex-col">
							<div
								class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
								<div class="border-b">
									<div class="bg-blue-800 p-2 shadow text-xl text-white">
										<h3 class="font-bold pl-2" style="font-size:16px"> Butiran Pembayaran | Ansuran
										</h3>
									</div>
									<div class="flex">

									</div>
								</div>
								<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
										<div class="rounded-full bg-orange inline-flex mr-3">
											<svg class="fill-current text-white h-8 w-8 block"
												xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
												<g fill-rule="evenodd">
													<path
														d="M21.78 15.37c.51-.61.83-1.4.83-2.26 0-2.74-1.6-4.38-4.24-4.38V5.45c0-.12-.1-.22-.22-.22h-1.27c-.11 0-.2.1-.2.21v3.3h-1.7V5.44c0-.12-.1-.22-.22-.22H13.5c-.12 0-.2.1-.21.21v3.3H9.67c-.12 0-.21.09-.21.21v1.31c0 .12.1.22.21.22h.21c.94 0 1.7.79 1.7 1.75v7c0 .92-.68 1.67-1.55 1.75a.21.21 0 0 0-.18.16l-.33 1.32c-.01.06 0 .13.04.19.04.05.1.08.17.08h3.55v3.3c0 .1.1.2.2.2h1.28c.12 0 .21-.1.21-.22v-3.28h1.7v3.3c0 .1.1.2.21.2h1.27c.12 0 .22-.1.22-.22v-3.28h.85c2.65 0 4.24-1.64 4.24-4.37 0-1.28-.68-2.39-1.68-3zm-6.8-4.01h2.54c.94 0 1.7.78 1.7 1.75 0 .96-.76 1.75-1.7 1.75h-2.55v-3.5zm3.39 8.75h-3.4v-3.5h3.4c.93 0 1.7.78 1.7 1.75 0 .96-.77 1.75-1.7 1.75z">
													</path>
												</g>
											</svg>
										</div>
										Ansuran Terakhir diTerima
									</div>
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">

										RM{{NUMBER_FORMAT($data[0]->last_pymt_amt,2)}}
									</div>
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">

										Tarikh Terakhir di Terima
									</div>
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">

										{{isset($data[0]->last_payment_date) ? date("d-m-Y", strtotime(substr($data[0]->last_payment_date,0,10))):''}}
									</div>
								</div>
								<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
										<div class="rounded-full bg-orange inline-flex mr-3">
											<svg class="fill-current text-white h-8 w-8 block"
												xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
												<g fill-rule="evenodd">
													<path
														d="M21.78 15.37c.51-.61.83-1.4.83-2.26 0-2.74-1.6-4.38-4.24-4.38V5.45c0-.12-.1-.22-.22-.22h-1.27c-.11 0-.2.1-.2.21v3.3h-1.7V5.44c0-.12-.1-.22-.22-.22H13.5c-.12 0-.2.1-.21.21v3.3H9.67c-.12 0-.21.09-.21.21v1.31c0 .12.1.22.21.22h.21c.94 0 1.7.79 1.7 1.75v7c0 .92-.68 1.67-1.55 1.75a.21.21 0 0 0-.18.16l-.33 1.32c-.01.06 0 .13.04.19.04.05.1.08.17.08h3.55v3.3c0 .1.1.2.2.2h1.28c.12 0 .21-.1.21-.22v-3.28h1.7v3.3c0 .1.1.2.21.2h1.27c.12 0 .22-.1.22-.22v-3.28h.85c2.65 0 4.24-1.64 4.24-4.37 0-1.28-.68-2.39-1.68-3zm-6.8-4.01h2.54c.94 0 1.7.78 1.7 1.75 0 .96-.76 1.75-1.7 1.75h-2.55v-3.5zm3.39 8.75h-3.4v-3.5h3.4c.93 0 1.7.78 1.7 1.75 0 .96-.77 1.75-1.7 1.75z">
													</path>
												</g>
											</svg>
										</div>
										Bil. | No. Pembayaran
									</div>
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
										{{$data[0]->instalment_no}}
									</div>
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
										Jumlah Pembayaran
									</div>
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
										RM{{NUMBER_FORMAT($data[0]->payment_amount,2)}}
									</div>
								</div>
								<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
										<div class="rounded-full bg-orange inline-flex mr-3">
											<svg class="fill-current text-white h-8 w-8 block"
												xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
												<g fill-rule="evenodd">
													<path
														d="M21.78 15.37c.51-.61.83-1.4.83-2.26 0-2.74-1.6-4.38-4.24-4.38V5.45c0-.12-.1-.22-.22-.22h-1.27c-.11 0-.2.1-.2.21v3.3h-1.7V5.44c0-.12-.1-.22-.22-.22H13.5c-.12 0-.2.1-.21.21v3.3H9.67c-.12 0-.21.09-.21.21v1.31c0 .12.1.22.21.22h.21c.94 0 1.7.79 1.7 1.75v7c0 .92-.68 1.67-1.55 1.75a.21.21 0 0 0-.18.16l-.33 1.32c-.01.06 0 .13.04.19.04.05.1.08.17.08h3.55v3.3c0 .1.1.2.2.2h1.28c.12 0 .21-.1.21-.22v-3.28h1.7v3.3c0 .1.1.2.21.2h1.27c.12 0 .22-.1.22-.22v-3.28h.85c2.65 0 4.24-1.64 4.24-4.37 0-1.28-.68-2.39-1.68-3zm-6.8-4.01h2.54c.94 0 1.7.78 1.7 1.75 0 .96-.76 1.75-1.7 1.75h-2.55v-3.5zm3.39 8.75h-3.4v-3.5h3.4c.93 0 1.7.78 1.7 1.75 0 .96-.77 1.75-1.7 1.75z">
													</path>
												</g>
											</svg>
										</div>
										Tarikh Pembayaran Terkini
									</div>
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
										{{isset($data[0]->last_payment_date) ? date("d-m-Y", strtotime(substr($data[0]->last_payment_date,0,10))):''}}
									</div>
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
										Sila Bayar Sebelum
									</div>
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
										{{isset($data[0]->last_instal_due_date) ? date("d-m-Y", strtotime(substr($data[0]->last_instal_due_date,0,10))):''}}
									</div>
								</div>
								<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
										<div class="rounded-full bg-orange inline-flex mr-3">
											<svg class="fill-current text-white h-8 w-8 block"
												xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
												<g fill-rule="evenodd">
													<path
														d="M21.78 15.37c.51-.61.83-1.4.83-2.26 0-2.74-1.6-4.38-4.24-4.38V5.45c0-.12-.1-.22-.22-.22h-1.27c-.11 0-.2.1-.2.21v3.3h-1.7V5.44c0-.12-.1-.22-.22-.22H13.5c-.12 0-.2.1-.21.21v3.3H9.67c-.12 0-.21.09-.21.21v1.31c0 .12.1.22.21.22h.21c.94 0 1.7.79 1.7 1.75v7c0 .92-.68 1.67-1.55 1.75a.21.21 0 0 0-.18.16l-.33 1.32c-.01.06 0 .13.04.19.04.05.1.08.17.08h3.55v3.3c0 .1.1.2.2.2h1.28c.12 0 .21-.1.21-.22v-3.28h1.7v3.3c0 .1.1.2.21.2h1.27c.12 0 .22-.1.22-.22v-3.28h.85c2.65 0 4.24-1.64 4.24-4.37 0-1.28-.68-2.39-1.68-3zm-6.8-4.01h2.54c.94 0 1.7.78 1.7 1.75 0 .96-.76 1.75-1.7 1.75h-2.55v-3.5zm3.39 8.75h-3.4v-3.5h3.4c.93 0 1.7.78 1.7 1.75 0 .96-.77 1.75-1.7 1.75z">
													</path>
												</g>
											</svg>
										</div>
										Bayaran Seterusnya Pada
									</div>
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
										{{isset($data[0]->instal_due_date) ? date("d-m-Y", strtotime(SUBSTR($data[0]->instal_due_date,0,10))):''}}
									</div>
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
										Ansuran
									</div>
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
										RM{{NUMBER_FORMAT($data[0]->install_amt,2)}} {{$data[0]->instmode}}
									</div>
								</div>
								<div class="flex-grow flex px-3 py-3 text-grey-darker items-center border-b -mx-2">
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
										<div class="rounded-full bg-orange inline-flex mr-3">
											<svg class="fill-current text-white h-8 w-8 block"
												xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
												<g fill-rule="evenodd">
													<path
														d="M21.78 15.37c.51-.61.83-1.4.83-2.26 0-2.74-1.6-4.38-4.24-4.38V5.45c0-.12-.1-.22-.22-.22h-1.27c-.11 0-.2.1-.2.21v3.3h-1.7V5.44c0-.12-.1-.22-.22-.22H13.5c-.12 0-.2.1-.21.21v3.3H9.67c-.12 0-.21.09-.21.21v1.31c0 .12.1.22.21.22h.21c.94 0 1.7.79 1.7 1.75v7c0 .92-.68 1.67-1.55 1.75a.21.21 0 0 0-.18.16l-.33 1.32c-.01.06 0 .13.04.19.04.05.1.08.17.08h3.55v3.3c0 .1.1.2.2.2h1.28c.12 0 .21-.1.21-.22v-3.28h1.7v3.3c0 .1.1.2.21.2h1.27c.12 0 .22-.1.22-.22v-3.28h.85c2.65 0 4.24-1.64 4.24-4.37 0-1.28-.68-2.39-1.68-3zm-6.8-4.01h2.54c.94 0 1.7.78 1.7 1.75 0 .96-.76 1.75-1.7 1.75h-2.55v-3.5zm3.39 8.75h-3.4v-3.5h3.4c.93 0 1.7.78 1.7 1.75 0 .96-.77 1.75-1.7 1.75z">
													</path>
												</g>
											</svg>
										</div>
										Tarikh Mula Bayar
									</div>
									<div class="w-2/5 xl:w-1/4 px-6 flex items-center" style="font-size:12px">
										{{isset($data[0]->start_instal_date) ? date("d-m-Y", strtotime(SUBSTR($data[0]->start_instal_date,0,10))):''}}
									</div>
								</div>
								<div class="px-6 py-4">
									<div class="text-right text-grey" style="font-size:12px">
										<b> Kemaskini Akhir </b> :
										{{isset($data[0]->last_modified_date) ? date("d-m-Y", strtotime(substr($data[0]->last_modified_date,0,10))):''}} &nbsp
										&nbsp &nbsp
										<b> Oleh </b> : {{$data[0]->last_modified_user}}
									</div>
								</div>
							</div>
						</div>
						<!-- END BUTIRAN -->

					</div>
				</div>
			</div>
			<div id="2" class="hidden p-4">
				<!-- rekod transaksi e-fms -->
				<div
					class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
					<table>
						<thead>
							<tr>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"
									style="font-size:12px">No.Resit</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"
									style="font-size:12px">Amaun Resit</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"
									style="font-size:12px">Pegawai Kutipan</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"
									style="font-size:12px">Tarikh Resit</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"
									style="font-size:12px">No.Kelompok</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"
									style="font-size:12px">Jenis Resit</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"
									style="font-size:12px">No.Cek</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"
									style="font-size:12px">Kod Bank</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"
									style="font-size:12px">Key-In Officer</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"
									style="font-size:12px">Tarikh Transaksi</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"
									style="font-size:12px">Status Resit</th>
								<th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"
									style="font-size:12px">Pengesahan</th>
							</tr>
						</thead>
						@foreach ($resit as $item)
						<tbody class="bg-white">
							<tr>
								<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
									<div class="flex items-center">
										<div style="font-size:12px">
											{{$item->resit_no}}
										</div>
									</div>
								</td>

								<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
									<div class="flex items-center">
										<div style="font-size:12px">
											{{number_format($item->resit_amount,2)}}
										</div>
									</div>
								</td>

								<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
									<div class="flex items-center">
										<div style="font-size:12px">
											{{-- {{ substr($item->hdate,0,2).'/'.substr($item->hdate,2,2).'/'.substr($item->hdate,4,4) }}
											--}}
											{{$item->collector}}
										</div>
									</div>
								</td>

								<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
									<div class="flex items-center">
										<div style="font-size:12px">
											{{$item->resitdt}}
										</div>
									</div>
								</td>
								<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
									<div class="flex items-center">
										<div style="font-size:12px">
											{{$item->bis_no}}
										</div>
									</div>
								</td>

								<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
									<div class="flex items-center">
										<div style="font-size:12px">
											{{$item->type}}
										</div>
									</div>
								</td>
								<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
									<div class="flex items-center">
										<div style="font-size:12px">
											{{$item->cheque_no}}
										</div>
									</div>
								</td>
								<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
									<div class="flex items-center">
										<div style="font-size:12px">
											{{$item->cheque_bank_code}}
										</div>
									</div>
								</td>
								<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
									<div class="flex items-center">
										<div style="font-size:12px">
											{{$item->officer_incharge}}
										</div>
									</div>
								</td>
								<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
									<div class="flex items-center">
										<div style="font-size:12px">
											{{$item->trx_date}}
										</div>
									</div>
								</td>
								<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
									<div class="flex items-center">
										<div style="font-size:12px">
											{{$item->status_resit}}
										</div>
									</div>
								</td>
								<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
									<div class="flex items-center">
										<div style="font-size:12px">
											{{$item->vld_status}}
										</div>
									</div>
								</td>
							</tr>
						</tbody>
						@endforeach
					</table>
				</div>
				<!-- end rekod transaksi e-fms-->
			</div>
		</div>
	</div>
	<!-- end tabs for efms  ***************************************************************************************************************************-->

</div>
<!-- end efms kedudukan akaun -->
@endif
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
	function changeAtiveTab(event, tabID) {
		let element = event.target;
		while (element.nodeName !== "A") {
			element = element.parentNode;
		}
		ulElement = element.parentNode.parentNode;
		aElements = ulElement.querySelectorAll("li > a");
		tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
		for (let i = 0; i < aElements.length; i++) {
			aElements[i].classList.remove("text-white");
			aElements[i].classList.remove("bg-blue-600");
			aElements[i].classList.add("text-blue-600");
			aElements[i].classList.add("bg-white");
			tabContents[i].classList.add("hidden");
			tabContents[i].classList.remove("block");
		}
		element.classList.remove("text-blue-600");
		element.classList.remove("bg-white");
		element.classList.add("text-white");
		element.classList.add("bg-blue-600");
		document.getElementById(tabID).classList.remove("hidden");
		document.getElementById(tabID).classList.add("block");
	}
	// hide show content 
	let tabsContainer = document.querySelector("#tabs");
	let tabTogglers = tabsContainer.querySelectorAll("a");
	console.log(tabTogglers);
	tabTogglers.forEach(function(toggler) {
		toggler.addEventListener("click", function(e) {
			e.preventDefault();
			let tabName = this.getAttribute("href");
			let tabContents = document.querySelector("#tab-contents");
			for (let i = 0; i < tabContents.children.length; i++) {
				tabTogglers[i].parentElement.classList.remove("border-t", "border-r", "border-l", "-mb-px",
					"bg-white");
				tabContents.children[i].classList.remove("hidden");
				if ("#" + tabContents.children[i].id === tabName) {
					continue;
				}
				tabContents.children[i].classList.add("hidden");
			}
			e.target.parentElement.classList.add("border-t", "border-r", "border-l", "-mb-px", "bg-white");
		});
	});
	document.getElementById("default-tab").click();
	// hide show contect end
</script>
<!-- new design end -->

@endsection