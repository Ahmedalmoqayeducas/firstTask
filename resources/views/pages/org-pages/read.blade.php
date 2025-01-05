@extends('layouts.dashboard')
@section('content')
    <button id="showPopup" class="btn btn-primary">add a new page</button>
    <div class="card">
        <header class=" card-header noborder">
            <h4 class="card-title">Table Head
            </h4>
        </header>
        <!-- زر لفتح الـ Popup -->
        {{-- <button id="openPopup" class="btn btn-primary">إنشاء صفحة جديدة</button> --}}
        <!-- زر عرض SweetAlert -->

        <div class="card-body px-6 pb-6">
            <div class="overflow-x-auto -mx-6">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr>

                                    <th scope="col" class=" table-th ">
                                        id
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        Page Name
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        operations
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @foreach ($data as $element)
                                    <tr>
                                        <td class="table-td">{{ $loop->index + 1 }}</td>
                                        <td class="table-td">{{ $element->name }}</td>
                                        <td class="table-td ">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                <a href="{{ route('page-posts.edit', $element->id) }}"
                                                    class="action-btn btn-primary "> <iconify-icon
                                                        icon="heroicons:eye"></iconify-icon></a>
                                                <button type="button"
                                                    onclick="editPage('{{ $element->id }}', '{{ $element->name }}')"
                                                    class="action-btn btn-warning">
                                                    <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                </button>
                                                <button type="button" onclick="destroy({{ $element->id }})"
                                                    class="action-btn btn-danger">
                                                    <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="container">
                            {{ $data->links() }}
                        </div>
                    </div>
                    {{-- {{$dat/a->links()}} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // وظيفة تعديل الصفحة باستخدام Swal
        function editPage(pageId, currentName) {
            Swal.fire({
                title: 'Edit Page',
                text: 'Enter the new name for the page',
                input: 'text',
                inputValue: currentName, // الاسم الحالي كقيمة افتراضية
                inputPlaceholder: 'Enter new page name',
                showCancelButton: true,
                confirmButtonText: 'Update',
                cancelButtonText: 'Cancel',
                background: '#ffffff',
                customClass: {
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    text: 'custom-swal-text',
                    input: 'custom-swal-input',
                    confirmButton: 'custom-swal-confirm',
                    cancelButton: 'custom-swal-cancel'
                },
                inputValidator: (value) => {
                    if (!value) {
                        return 'Please enter a page name!';
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const newPageName = result.value; // القيمة المدخلة في الحقل

                    // إرسال طلب باستخدام Axios لتحديث الصفحة
                    axios.put(`/dash/pages/${pageId}`, {
                            name: newPageName
                        }, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF Token
                            }
                        })
                        .then(response => {
                            Swal.fire({
                                title: response.data.success ? 'Success!' : 'Error!',
                                text: response.data.message, // عرض الرسالة من الاستجابة
                                icon: response.data.success ? 'success' : 'error',
                                background: '#ffffff',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title',
                                    text: 'custom-swal-text'
                                }
                            }).then(() => {
                                if (response.data.success) {
                                    // إعادة تحميل الصفحة لتحديث الجدول
                                    location.reload();
                                }
                            });
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error!',
                                text: error.response ? error.response.data.message :
                                    'An error occurred while connecting to the server.',
                                icon: 'error',
                                background: '#ffffff',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title',
                                    text: 'custom-swal-text'
                                }
                            });
                            console.error('Error:', error.response ? error.response.data : error.message);
                        });
                }
            });
        }
    </script>
    <script>
        function destroy(id) {
            axios.delete(`/dash/pages/${id}`).then(function(response) {

                document.getElementById(`element_${id}`).remove();
                // toastr.success(error.response.data.message);
                
            }).catch(function(error) {
                toastr.error(error.response.data.message);
            })
        }
    </script>
    <script src="{{ asset('dashboard/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        document.getElementById('showPopup').addEventListener('click', function() {
            // عرض SweetAlert2
            Swal.fire({
                title: 'Create Page ',
                text: 'Enter The Name Of The Page',
                input: 'text',
                inputPlaceholder: 'Enter Here   ',
                showCancelButton: true,
                confirmButtonText: 'done',
                cancelButtonText: 'cancel',
                background: '#ffffff',
                customClass: {
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    text: 'custom-swal-text',
                    input: 'custom-swal-input',
                    confirmButton: 'custom-swal-confirm',
                    cancelButton: 'custom-swal-cancel'
                },
                inputValidator: (value) => {
                    if (!value) {
                        return 'Enter The Name!';
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const pageName = result.value; // القيمة المدخلة في الحقل

                    // إرسال طلب باستخدام Axios
                    axios.post(`{{ route('pages.store') }}`, {
                            name: pageName
                        }, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF Token
                            }
                        })
                        .then(response => {

                            if (response.data.message) {

                                Swal.fire({
                                    title: 'done!',
                                    text: "Page Has Been Created Successfully",
                                    icon: 'success',
                                    background: '#ffffff',
                                    customClass: {
                                        popup: 'custom-swal-popup',
                                        title: 'custom-swal-title',
                                        text: 'custom-swal-text'
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Page Failed To Create',
                                    icon: 'error',
                                    background: '#ffffff', // خلفية بيضاء لرسالة الخطأ
                                    customClass: {
                                        popup: 'custom-swal-popup',
                                        title: 'custom-swal-title',
                                        text: 'custom-swal-text'
                                    }
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error!',
                                text: error.respones.data.message,
                                icon: 'error',
                                background: '#ffffff',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title',
                                    text: 'custom-swal-text'
                                }
                            });
                            console.error('Error:', error.response ? error.response.data : error
                                .message);
                        });
                }
            });
        });
    </script>


    <!-- CSS مخصص -->
    <style>
        /* تصميم النافذة */
        .custom-swal-popup {
            border: 2px solid #6c757d;
            /* حدود رمادية */
            border-radius: 10px;
        }

        /* عنوان النافذة */
        .custom-swal-title {
            color: #007bff;
            /* أزرق */
            font-weight: bold;
        }

        /* النص داخل النافذة */
        .custom-swal-text {
            color: #000;
            /* أسود */
        }

        /* حقل الإدخال */
        .custom-swal-input {
            border: 1px solid #6c757d;
            /* حدود رمادية لحقل الإدخال */
        }

        /* زر التأكيد */
        .custom-swal-confirm {
            background-color: #007bff;
            /* أزرق */
            color: #fff;
        }

        /* زر الإلغاء */
        .custom-swal-cancel {
            background-color: #6c757d;
            /* رمادي */
            color: #fff;
        }
    </style>
    {{-- @endsection --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('dashboard/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
