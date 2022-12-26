@props(['carts', 'grandQuantity'])
<div class="border rounded-lg overflow-hidden">
    <div class="bg-white border-b px-4 py-3 text-gray-700 font-medium flex items-center">
        Keranjang Anda
    </div>
    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 divide-y divide-gray-200">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-4 py-3 w-0"></th>
                    <th scope="col" class="px-4 py-3">Nama Barang</th>
                    <th scope="col" class="px-4 py-3 text-right">Jumlah</th>
                    <th scope="col" class="px-4 py-3 w-0">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($carts as $i=>$cart)
                    <tr>
                        <td class="py-3 px-4 whitespace-nowrap">
                            <a href="#" class="text-rose-600 text-xs" onclick="deleteData({{ $cart->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-circle-minus" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <line x1="9" y1="12" x2="15" y2="12"></line>
                                </svg>
                            </a>
                            <form id="delete-form-{{ $cart->id }}" action="{{ route('cart.destroy', $cart->id) }}"
                                method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                        <td class="py-3 px-4 whitespace-nowrap">
                            {{ $cart->product->name }}</td>
                        <td class="py-3 px-4 whitespace-nowrap text-right">
                            {{ $cart->quantity }} item
                        </td>
                        <td class="py-3 px-4 whitespace-nowrap text-right flex gap-2">
                            <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input
                                    class="w-16 border px-2 py-0.5 rounded focus:outline-none focus:ring-2 focus:ring-sky-600"
                                    value="{{ $cart->quantity }}" type="number" name="quantity" />
                            </form>
                        </td>
                    @empty
                        <td class="py-3 px-4 whitespace-nowrap" colSpan="4">
                            <div class="flex items-center justify-center h-96">
                                <div class="text-center flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="7 10 12 4 17 10"></polyline>
                                        <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                                        <circle cx="12" cy="15" r="2"></circle>
                                    </svg>
                                    <div class="mt-5">
                                        Keranjang Anda Kosong
                                    </div>
                                </div>
                            </div>
                        </td class="py-3 px-4 whitespace-nowrap">
                    </tr>
                @endforelse
                <tr className='bg-blue-50 text-blue-900 font-semibold'>
                    <td class="py-3 px-4 whitespace-nowrap"></td>
                    <td class="py-3 px-4 whitespace-nowrap">Total</td>
                    <td class="py-3 px-4 whitespace-nowrap text-right text-teal-500">
                        {{ $grandQuantity }} Item
                    </td>
                    <td class="py-3 px-4 whitespace-nowrap"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>