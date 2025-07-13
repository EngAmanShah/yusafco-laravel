@extends('layouts.app')

@section('title', 'لوحة تحكم المشرف')
@section('header-title')
    <div class="d-flex align-items-center">
        <i class="fa-solid fa-user-shield me-3 fs-4 text-success"></i>
        <span>لوحة تحكم المشرف</span>
    </div>
@endsection

@section('content')
    {{-- 1. Quick Stats Cards --}}
    <div class="row g-4 mb-4">
        <div class="col-lg-4 col-md-6">
            <div class="card text-center text-bg-warning border-0 shadow-sm">
                <div class="card-body">
                    <h1 class="display-4 fw-bold">{{ $pendingRequestsCount }}</h1>
                    <p class="mb-0 fs-5">طلبات خدمات قيد الانتظار</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card text-center text-bg-info border-0 shadow-sm">
                <div class="card-body">
                    <h1 class="display-4 fw-bold">{{ $totalMessagesCount }}</h1>
                    <p class="mb-0 fs-5">إجمالي رسائل التواصل</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card text-center text-bg-primary border-0 shadow-sm">
                 <div class="card-body">
                    <h1 class="display-4 fw-bold">{{ $totalFarmersCount }}</h1>
                    <p class="mb-0 fs-5">إجمالي عدد المزارعين</p>
                </div>
            </div>
        </div>
    </div>

    {{-- 2. Main Content Tabs --}}
    <div class="card shadow-sm border-light-subtle">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="adminTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="requests-tab" data-bs-toggle="tab" data-bs-target="#requests-panel" type="button">طلبات الخدمات <span class="badge bg-danger ms-1">{{ $requests->count() }}</span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages-panel" type="button">رسائل التواصل <span class="badge bg-danger ms-1">{{ $messages->count() }}</span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="farmers-tab" data-bs-toggle="tab" data-bs-target="#farmers-panel" type="button">إدارة المزارعين <span class="badge bg-warning text-dark ms-1">{{ $farmers->where('is_approved', false)->count() }}</span></button>
                </li>
            </ul>
        </div>
        <div class="card-body p-0">
            <div class="tab-content" id="adminTabContent">
                
                {{-- A. Service Requests Panel --}}
                <div class="tab-pane fade show active p-3" id="requests-panel" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr><th>المزارع</th><th>المنتج</th><th>الخدمة المطلوبة</th><th>الحالة</th><th style="width: 35%;">الإجراءات</th></tr>
                            </thead>
                        <tbody>
    @forelse ($requests as $request)
        <tr>
            <td><strong>{{ $request->user->name ?? 'مستخدم محذوف' }}</strong><br><small class="text-muted">{{ $request->user->farmName ?? '' }}</small></td>
            <td><strong>{{ $request->product_name }}</strong><br><small class="text-muted">{{ $request->quantity_kg }} كجم</small></td>
            <td>{{ $request->service_type }}</td>
            <td><span class="badge @if($request->status == 'Pending') bg-warning text-dark @elseif($request->status == 'Completed') bg-success @else bg-info text-dark @endif">{{ $request->status }}</span></td>
            <td>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#requestDetailsModal" data-notes="{{ $request->notes }}" data-date="{{ $request->created_at->format('Y-m-d') }}">التفاصيل</button>
                    
                    {{-- THIS IS THE FINAL, CORRECTED LINE --}}
                 <form action="{{ route('admin.requests.updateStatus', $request->request_id) }}" method="POST" class="d-inline-block">
                        @csrf
                        <div class="input-group">
                            <select name="new_status" class="form-select form-select-sm">
                                <option value="Pending" @selected($request->status == 'Pending')>قيد الانتظار</option>
                                <option value="In Progress" @selected($request->status == 'In Progress')>قيد التنفيذ</option>
                                <option value="Completed" @selected($request->status == 'Completed')>مكتمل</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-outline-primary">حفظ</button>
                        </div>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr><td colspan="5" class="text-center text-muted p-4">لا توجد طلبات خدمات حالياً.</td></tr>
    @endforelse
</tbody>
                        </table>
                    </div>
                </div>

                {{-- B. Messages Panel --}}
                <div class="tab-pane fade p-3" id="messages-panel" role="tabpanel">
                    <div class="table-responsive">
                         <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr><th>الاسم</th><th>الموضوع</th><th>تاريخ الإرسال</th><th>إجراء</th></tr>
                            </thead>
                            <tbody>
                                @forelse ($messages as $message)
                                    <tr style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#messageModal" data-name="{{ $message->contactName }}" data-email="{{ $message->email }}" data-subject="{{ $message->subject }}" data-message="{{ $message->message }}">
                                        <td>{{ $message->contactName }}</td>
                                        <td>{{ $message->subject }}</td>
                                        <td>{{ $message->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="event.stopPropagation(); return confirm('هل أنت متأكد؟');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="حذف الرسالة"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="text-center text-muted p-4">لا توجد رسائل تواصل حالياً.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- C. Farmer Approval Panel --}}
                <div class="tab-pane fade p-3" id="farmers-panel" role="tabpanel">
                     <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr><th>اسم المزارع</th><th>اسم المزرعة</th><th>البريد الإلكتروني</th><th>حالة الحساب</th><th>الإجراءات</th></tr>
                            </thead>
                            <tbody>
                                @forelse ($farmers as $farmer)
                                    <tr>
                                        <td>{{ $farmer->name }}</td>
                                        <td>{{ $farmer->farmName }}</td>
                                        <td>{{ $farmer->email }}</td>
                                        <td>
                                            @if($farmer->is_approved)
                                                <span class="badge bg-success">مُعتمد</span>
                                            @else
                                                <span class="badge bg-warning text-dark">قيد المراجعة</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$farmer->is_approved)
                                                <div class="d-flex gap-2">
                                                    <form action="{{ route('admin.farmers.approve', $farmer) }}" method="POST">@csrf<button type="submit" class="btn btn-sm btn-success">اعتماد</button></form>
                                                    <form action="{{ route('admin.farmers.reject', $farmer) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من رفض هذا المزارع؟ سيتم حذفه.');">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger">رفض</button></form>
                                                </div>
                                            @else
                                                <span class="text-muted small">لا يوجد إجراء</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="5" class="text-center text-muted p-4">لا يوجد مزارعين مسجلين حالياً.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- 3. Modals --}}
    <div class="modal fade" id="messageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="messageModalLabel"></h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><p><strong>من:</strong> <span id="messageFromName"></span> (<span id="messageFromEmail"></span>)</p><hr><p id="messageBody"></p></div></div></div>
    </div>
    <div class="modal fade" id="requestDetailsModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">تفاصيل الطلب</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><p><strong>تاريخ الطلب:</strong> <span id="requestDate"></span></p><hr><p><strong>ملاحظات المزارع:</strong></p><p id="requestNotes" class="bg-light p-3 rounded"></p></div></div></div>
    </div>
@endsection