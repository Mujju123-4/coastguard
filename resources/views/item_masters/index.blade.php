<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-6">
            <div class="flex-1 min-w-0">
                <div class="flex items-center">
                    <div class="p-3 bg-orange-600 rounded-2xl shadow-lg shadow-orange-600/30 mr-4">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight">Item Master</h2>
                        <div class="flex items-center mt-1 text-slate-500 font-medium text-sm">
                            <span class="flex h-2 w-2 rounded-full bg-orange-500 mr-2"></span>
                            Inventory Management System
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-3 bg-white p-2 rounded-[22px] border border-slate-100 shadow-xl shadow-slate-200/50">
                @if(auth()->user()->hasAnyRole(['Superadmin', 'Super Admin']))
                <div class="relative group pl-2">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-hover:text-amber-500 transition-colors pointer-events-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <select id="location_filter"
                            class="pl-10 pr-10 py-2.5 bg-slate-50 border-none rounded-xl text-sm font-bold text-slate-700 hover:bg-slate-100 focus:ring-0 transition-all appearance-none cursor-pointer min-w-[180px]">
                        <option value="">All Locations</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="h-8 w-px bg-slate-100 mx-1"></div>
                @endif

                <button onclick="exportItemMaster()"
                   class="inline-flex items-center px-4 py-2 bg-emerald-50 text-emerald-700 hover:bg-emerald-600 hover:text-white rounded-xl font-bold text-sm transition-all shadow-sm border border-emerald-100 hover:border-emerald-600 active:scale-95 group"
                   title="Export CSV">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Export CSV
                </button>

                @if(auth()->user()->hasAnyRole(['Superadmin', 'Super Admin']))
                <a href="{{ route('item-masters.import') }}"
                   class="inline-flex items-center px-4 py-2 bg-slate-50 text-slate-700 hover:bg-slate-800 hover:text-white rounded-xl font-bold text-sm transition-all shadow-sm border border-slate-200 hover:border-slate-800 active:scale-95 group"
                   title="Import CSV">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    Import CSV
                </a>
                @endif

                @can('create item masters')
                <a href="{{ route('item-masters.create') }}"
                   class="inline-flex items-center px-6 py-2.5 bg-slate-900 border border-slate-900 rounded-xl font-bold text-white hover:bg-orange-600 hover:border-orange-600 active:scale-95 transition-all shadow-lg shadow-slate-900/10 hover:shadow-orange-600/20">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    New Item
                </a>
                @endcan
            </div>
        </div>

        {{-- Table Container --}}
        <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/60 overflow-hidden border border-slate-100">
            <div class="p-6 overflow-x-auto">
                <table id="item-master-table" class="w-full border-separate border-spacing-y-0.5">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-2 py-4 text-left border-b border-slate-100 first:rounded-tl-2xl w-8 all"></th>
                            <th class="px-2 py-4 text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 w-12 min-tablet">Sr.</th>
                            <th class="px-3 py-4 text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 min-desktop">Location</th>
                            <th class="px-3 py-4 text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 all">Code</th>
                            <th class="px-3 py-4 text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 all">Equipment</th>
                            <th class="px-3 py-4 text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 min-tablet">Qty</th>
                            <th class="px-3 py-4 text-left text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 min-tablet">Serviced Date</th>
                            <th class="px-3 py-4 text-center text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 all">Status</th>
                            {{-- Must match JS hasActionRole condition exactly --}}
                            @if(auth()->user()->hasAnyRole(['Super Admin', 'Location Users']))
                            <th class="px-4 py-4 text-right text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 last:rounded-tr-2xl all">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="text-slate-600">
                        {{-- DataTables populates this --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- ===================== TICKET MODAL ===================== --}}
    <div id="ticket-modal-overlay"
         style="display:none; position:fixed; inset:0; z-index:9999;
                background:rgba(15,23,42,0.6);
                align-items:center; justify-content:center; padding:1rem;">

        <div id="ticket-modal"
             style="background:#fff; border-radius:1.5rem; border:1px solid #f1f5f9;
                    box-shadow:0 25px 60px rgba(0,0,0,0.18);
                    width:100%; max-width:540px; overflow:hidden;
                    transform:scale(0.92); opacity:0;
                    transition:transform 0.22s cubic-bezier(.34,1.56,.64,1), opacity 0.18s ease;">

            {{-- Modal header --}}
            <div style="display:flex; align-items:center; justify-content:space-between;
                        padding:1.25rem 1.5rem; border-bottom:1px solid #f1f5f9;">
                <div style="display:flex; align-items:center; gap:0.75rem;">
                    <div style="width:2.25rem; height:2.25rem; border-radius:0.625rem;
                                background:#f0fdf4; display:flex; align-items:center; justify-content:center;">
                        <svg style="width:1.25rem;height:1.25rem;color:#16a34a" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 style="font-size:1rem; font-weight:700; color:#0f172a; margin:0;">Raise Product Ticket</h3>
                        <p style="font-size:0.7rem; color:#94a3b8; margin:0.125rem 0 0;">Item details are auto-filled from your selection</p>
                    </div>
                </div>
                <button onclick="closeTicketModal()"
                        style="width:2rem; height:2rem; display:flex; align-items:center; justify-content:center;
                               border-radius:0.5rem; background:#f8fafc; border:none; cursor:pointer;
                               color:#64748b; transition:background 0.15s;"
                        onmouseover="this.style.background='#e2e8f0'"
                        onmouseout="this.style.background='#f8fafc'">
                    <svg style="width:1rem;height:1rem" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Form View --}}
            <div id="ticket-form-view">
                <div style="padding:1.25rem 1.5rem; overflow-y:auto; max-height:70vh;">

                    {{-- Auto-filled item card --}}
                    <div style="background:#f8fafc; border-radius:1rem; padding:1rem; border:1px solid #f1f5f9; margin-bottom:1rem;">
                        <p style="font-size:0.625rem; font-weight:700; color:#94a3b8; text-transform:uppercase; letter-spacing:0.1em; margin:0 0 0.75rem;">Product details (auto-filled)</p>
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:0.5rem 1.5rem; font-size:0.875rem;">
                            <div>
                                <span style="font-size:0.7rem; color:#94a3b8; display:block;">Item code</span>
                                <span id="modal-code" style="font-weight:700; color:#1e293b;">—</span>
                            </div>
                            <div>
                                <span style="font-size:0.7rem; color:#94a3b8; display:block;">Serial no.</span>
                                <span id="modal-serial" style="font-weight:600; color:#334155;">—</span>
                            </div>
                            <div style="grid-column:span 2">
                                <span style="font-size:0.7rem; color:#94a3b8; display:block;">Equipment / description</span>
                                <span id="modal-equipment" style="font-weight:600; color:#334155;">—</span>
                            </div>
                            <div>
                                <span style="font-size:0.7rem; color:#94a3b8; display:block;">Location</span>
                                <span id="modal-location" style="font-weight:600; color:#334155;">—</span>
                            </div>
                            <div>
                                <span style="font-size:0.7rem; color:#94a3b8; display:block;">Qty / UoM</span>
                                <span id="modal-qty" style="font-weight:600; color:#334155;">—</span>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="ticket-item-id">

                    {{-- Ticket Title --}}
                    <div style="margin-bottom:1rem;">
                        <label style="display:block; font-size:0.7rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:0.375rem;">
                            Ticket Title <span style="color:#f43f5e;">*</span>
                        </label>
                        <input type="text" id="ticket-title"
                               placeholder="Short summary of the issue"
                               oninput="validateTicket()"
                               style="width:100%; box-sizing:border-box; padding:0.625rem 1rem;
                                      background:#f8fafc; border:1.5px solid #e2e8f0; border-radius:0.75rem;
                                      font-size:0.875rem; color:#1e293b; outline:none; transition:border 0.15s;">
                    </div>

                    {{-- Equipment Status --}}
                    <div style="margin-bottom:1rem;">
                        <label style="display:block; font-size:0.7rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:0.375rem;">
                            Equipment Status <span style="color:#f43f5e;">*</span>
                        </label>
                        <div style="display:flex; gap:1rem; margin-bottom:0.5rem;">
                            <label style="display:flex; align-items:center; cursor:pointer;">
                                <input type="radio" name="equipment_status" value="operational" checked onclick="toggleStatusReason(); validateTicket();" style="margin-right:0.375rem;">
                                <span style="font-size:0.875rem; color:#1e293b; font-weight:600;">Operational</span>
                            </label>
                            <label style="display:flex; align-items:center; cursor:pointer;">
                                <input type="radio" name="equipment_status" value="non-operational" onclick="toggleStatusReason(); validateTicket();" style="margin-right:0.375rem;">
                                <span style="font-size:0.875rem; color:#1e293b; font-weight:600;">Non-operational</span>
                            </label>
                        </div>
                        <div id="equipment-status-reason-container" style="display:none;">
                            <input type="text" id="equipment-status-reason" placeholder="Reason for non-operational status" oninput="validateTicket()"
                                style="width:100%; box-sizing:border-box; padding:0.625rem 1rem; background:#f8fafc; border:1.5px solid #e2e8f0; border-radius:0.75rem; font-size:0.875rem; color:#1e293b; outline:none; transition:border 0.15s;">
                        </div>
                    </div>

                    {{-- Issue Type --}}
                    <div style="margin-bottom:1rem;">
                        <label style="display:block; font-size:0.7rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:0.375rem;">Issue Type</label>
                        <div style="display:flex; flex-wrap:wrap; gap:0.5rem;">
                            <button type="button" data-val="damage"   onclick="setIssueType(this)" class="issue-chip active-chip">Damage</button>
                            <button type="button" data-val="shortage" onclick="setIssueType(this)" class="issue-chip">Shortage</button>
                            <button type="button" data-val="mismatch" onclick="setIssueType(this)" class="issue-chip">Mismatch</button>
                            <button type="button" data-val="delay"    onclick="setIssueType(this)" class="issue-chip">Delay</button>
                            <button type="button" data-val="customs"  onclick="setIssueType(this)" class="issue-chip">Customs</button>
                            <button type="button" data-val="other"    onclick="setIssueType(this)" class="issue-chip">Other</button>
                        </div>
                    </div>

                    {{-- Priority --}}
                    <div style="margin-bottom:1rem;">
                        <label style="display:block; font-size:0.7rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:0.375rem;">
                            Priority <span style="color:#f43f5e;">*</span>
                        </label>
                        <div style="display:flex; gap:0.5rem;">
                            <button type="button" data-val="low"      onclick="setTicketPriority(this)" class="pri-chip pri-low">Low</button>
                            <button type="button" data-val="medium"   onclick="setTicketPriority(this)" class="pri-chip pri-medium active-pri">Medium</button>
                            <button type="button" data-val="high"     onclick="setTicketPriority(this)" class="pri-chip pri-high">High</button>
                            <button type="button" data-val="critical" onclick="setTicketPriority(this)" class="pri-chip pri-critical">Critical</button>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div style="margin-bottom:1rem;">
                        <label style="display:block; font-size:0.7rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:0.375rem;">
                            Description <span style="color:#f43f5e;">*</span>
                        </label>
                        <textarea id="ticket-desc" rows="3" maxlength="1000"
                                  placeholder="Describe the issue — observation, impact, steps..."
                                  oninput="countTicketChars(); validateTicket()"
                                  style="width:100%; box-sizing:border-box; padding:0.625rem 1rem;
                                         background:#f8fafc; border:1.5px solid #e2e8f0; border-radius:0.75rem;
                                         font-size:0.875rem; color:#1e293b; outline:none; resize:none; transition:border 0.15s; font-family:inherit;"></textarea>
                        <p id="ticket-char-count" style="text-align:right; font-size:0.7rem; color:#94a3b8; margin:0.25rem 0 0;">0 / 1000</p>
                    </div>

                    {{-- Image Upload --}}
                    <div style="margin-bottom:1rem;">
                        <label style="display:block; font-size:0.7rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:0.375rem;">
                            Attach Image (Optional)
                        </label>
                        <div style="position:relative; width:100%; box-sizing:border-box; padding:0.625rem 1rem;
                                    background:#f8fafc; border:1.5px dashed #cbd5e1; border-radius:1rem;
                                    display:flex; align-items:center; gap:0.5rem; transition:border 0.15s;"
                             id="ticket-image-container">
                            <svg style="width:1.25rem; height:1.25rem; color:#94a3b8;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6.75a1.5 1.5 0 00-1.5-1.5H3.75a1.5 1.5 0 00-1.5 1.5v12.75a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            <input type="file" id="ticket-image" accept="image/*"
                                   style="position:absolute; width:100%; height:100%; top:0; left:0; opacity:0; cursor:pointer;"
                                   onchange="handleImageSelect(this)">
                            <span id="ticket-image-name" style="font-size:0.8rem; color:#94a3b8;">Click to upload or drag & drop</span>
                        </div>
                        {{-- Image Preview --}}
                        <div id="ticket-image-preview-container" style="display:none; margin-top:0.75rem; position:relative;">
                            <img id="ticket-image-preview" src="#" style="max-width:100%; max-height:150px; border-radius:0.75rem; border:1px solid #e2e8f0;">
                            {{-- Fixed: was height:200px; max-height:20px which made the button 200px tall --}}
                            <button type="button" onclick="removeSelectedImage()"
                                    style="position:absolute; top:-8px; right:-8px; background:#f43f5e; color:white;
                                           border:none; border-radius:50%; width:20px; height:20px;
                                           cursor:pointer; font-size:10px; font-weight:bold;
                                           display:flex; align-items:center; justify-content:center;">×</button>
                        </div>
                        <p id="ticket-image-error" style="display:none; color:#f43f5e; font-size:0.75rem; font-weight:600; margin-top:0.375rem;"></p>
                    </div>

                    {{-- Contact Details --}}
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-bottom:1rem;">
                        <div style="grid-column: span 2;">
                            <label style="display:block; font-size:0.7rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:0.375rem;">
                                Contact Name <span style="color:#f43f5e;">*</span>
                            </label>
                            <input type="text" id="ticket-contact-name"
                                   value="{{ auth()->user()->name }}"
                                   oninput="validateTicket()"
                                   style="width:100%; box-sizing:border-box; padding:0.625rem 1rem;
                                          background:#f8fafc; border:1.5px solid #e2e8f0; border-radius:0.75rem;
                                          font-size:0.875rem; color:#1e293b; outline:none; transition:border 0.15s;">
                        </div>
                        <div>
                            <label style="display:block; font-size:0.7rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:0.375rem;">
                                Contact Email <span style="color:#f43f5e;">*</span>
                            </label>
                            <input type="email" id="ticket-contact-email"
                                   value="{{ auth()->user()->email }}"
                                   oninput="validateTicket()"
                                   style="width:100%; box-sizing:border-box; padding:0.625rem 1rem;
                                          background:#f8fafc; border:1.5px solid #e2e8f0; border-radius:0.75rem;
                                          font-size:0.875rem; color:#1e293b; outline:none; transition:border 0.15s;">
                        </div>
                        <div>
                            <label style="display:block; font-size:0.7rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:0.375rem;">
                                Contact Phone <span style="color:#f43f5e;">*</span>
                            </label>
                            <input type="text" id="ticket-contact-phone"
                                   value="{{ auth()->user()->phone }}"
                                   oninput="validateTicket()"
                                   style="width:100%; box-sizing:border-box; padding:0.625rem 1rem;
                                          background:#f8fafc; border:1.5px solid #e2e8f0; border-radius:0.75rem;
                                          font-size:0.875rem; color:#1e293b; outline:none; transition:border 0.15s;">
                        </div>
                    </div>
                </div>

                {{-- Footer --}}
                <div style="display:flex; align-items:center; justify-content:space-between;
                            padding:1rem 1.5rem; border-top:1px solid #f1f5f9; background:#f8fafc99;">
                    <span id="ticket-hint" style="font-size:0.75rem; color:#94a3b8;">Fill in title and description</span>
                    <div style="display:flex; gap:0.5rem;">
                        <button type="button" onclick="closeTicketModal()"
                                style="padding:0.5rem 1rem; font-size:0.875rem; color:#475569;
                                       background:#fff; border:1px solid #e2e8f0; border-radius:0.75rem; cursor:pointer;">
                            Cancel
                        </button>
                        <button type="button" id="ticket-submit-btn" disabled onclick="submitTicket()"
                                style="padding:0.5rem 1.25rem; font-size:0.875rem; font-weight:700; color:#fff;
                                       background:#16a34a; border:none; border-radius:0.75rem; cursor:pointer; transition:all 0.15s;">
                            Submit ticket
                        </button>
                    </div>
                </div>
            </div>

            {{-- Success View --}}
            <div id="ticket-success-view" style="display:none; flex-direction:column; align-items:center;
                                                  justify-content:center; gap:1rem; padding:3rem 2rem; text-align:center;">
                <div style="width:3.5rem; height:3.5rem; border-radius:50%; background:#f0fdf4;
                            display:flex; align-items:center; justify-content:center;">
                    <svg style="width:1.75rem;height:1.75rem;color:#16a34a" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <div>
                    <p style="font-size:1rem; font-weight:700; color:#0f172a; margin:0;">Ticket raised successfully!</p>
                    <p id="ticket-success-msg" style="font-size:0.875rem; color:#64748b; margin:0.25rem 0 0;">Your ticket has been logged.</p>
                </div>
                <div id="ticket-summary-card"
                     style="width:100%; background:#f8fafc; border:1px solid #f1f5f9; border-radius:1rem;
                            padding:1rem; font-size:0.875rem; text-align:left;"></div>
                <div style="display:flex; gap:0.5rem; margin-top:0.5rem;">
                    <button type="button" onclick="resetTicketModal()"
                            style="padding:0.5rem 1rem; font-size:0.875rem; color:#475569;
                                   background:#fff; border:1px solid #e2e8f0; border-radius:0.75rem; cursor:pointer;">
                        Raise another
                    </button>
                    <button type="button" onclick="closeTicketModal()"
                            style="padding:0.5rem 1.25rem; font-size:0.875rem; font-weight:700; color:#fff;
                                   background:#0f172a; border:none; border-radius:0.75rem; cursor:pointer;">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- ===================== END TICKET MODAL ===================== --}}

    {{-- ===================== STATUS DETAILS MODAL ===================== --}}
    <div id="status-modal" class="fixed inset-0 z-[100] hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-slate-900/80 backdrop-blur-sm" onclick="closeStatusModal()"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:min-h-screen">&#8203;</span>
            <div class="inline-block overflow-hidden text-left align-middle transition-all transform bg-white shadow-2xl rounded-3xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-slate-100">
                <div class="bg-slate-50 px-6 py-4 border-b border-slate-100 flex justify-between items-center">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 rounded-xl bg-orange-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h3 class="text-sm font-bold text-slate-800 uppercase tracking-widest">Equipment Condition Report</h3>
                    </div>
                    <button onclick="closeStatusModal()" class="text-slate-400 hover:text-slate-600 transition-colors p-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <div class="px-8 py-10">
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200 shadow-inner">
                        <p id="status-modal-reason" class="text-lg font-medium text-slate-700 leading-relaxed text-center italic">--</p>
                    </div>
                </div>
                <div class="bg-slate-50 px-6 py-4 flex justify-end">
                    <button onclick="closeStatusModal()" class="bg-slate-800 hover:bg-slate-900 text-white font-bold py-2 px-8 rounded-xl transition-all shadow-lg active:scale-95 text-xs uppercase tracking-widest">
                        Dismiss
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <style>
        /* DataTable overrides */
        .dataTables_wrapper { padding-top: 0.5rem; }
        .dataTables_filter { margin-bottom: 1.5rem !important; float: left !important; }
        .dataTables_filter input {
            background: #f8fafc !important; border: 1px solid #e2e8f0 !important;
            border-radius: 12px !important; padding: 0.6rem 1rem !important;
            width: 300px !important; margin-left: 0 !important; transition: all 0.2s;
        }
        .dataTables_filter input:focus {
            background: #fff !important; border-color: #ea580c !important;
            box-shadow: 0 0 0 4px rgba(234,88,12,0.1) !important; outline: none !important;
        }
        .dataTables_length { margin-bottom: 1.5rem !important; float: right !important; }
        .dataTables_length select {
            width: 64px !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 8px !important;
            padding: 0.4rem 2rem 0.4rem 0.8rem !important;
        }
        table.dataTable.no-footer { border-bottom: none !important; }
        table.dataTable tbody tr { background: transparent !important; transition: all 0.2s; }
        table.dataTable tbody tr:hover { background: #f8fafc !important; }
        table.dataTable tbody td { padding: 1.1rem 1.5rem !important; border-bottom: 1px solid #f1f5f9 !important; }

        /* Pagination */
        .dataTables_wrapper .dataTables_paginate .paginate_button { border-radius: 8px !important; border: 1px solid transparent !important; margin: 0 2px !important; padding: 0.4rem 0.8rem !important; }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover { background: #ea580c !important; color: white !important; border-color: #ea580c !important; }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover:not(.current):not(.disabled) { background: #fff7ed !important; color: #ea580c !important; border-color: #fdba74 !important; }

        /* Issue type chips */
        .issue-chip {
            padding: 4px 14px; border-radius: 999px; font-size: 12px; font-weight: 600;
            border: 1.5px solid #e2e8f0; background: #f8fafc; color: #64748b;
            cursor: pointer; transition: all 0.15s;
        }
        .issue-chip:hover, .issue-chip.active-chip { background: #eff6ff; border-color: #93c5fd; color: #1d4ed8; }

        /* Priority chips */
        .pri-chip { flex: 1; padding: 6px 0; border-radius: 999px; font-size: 12px; font-weight: 600; cursor: pointer; border: 1.5px solid transparent; transition: all 0.15s; }
        .pri-low      { background: #f0fdf4; color: #166534; border-color: #86efac; }
        .pri-medium   { background: #fffbeb; color: #92400e; border-color: #fcd34d; }
        .pri-high     { background: #fff7ed; color: #9a3412; border-color: #fdba74; }
        .pri-critical { background: #fef2f2; color: #991b1b; border-color: #fca5a5; }
        .pri-chip.active-pri.pri-low      { background: #16a34a; color: #fff; border-color: #16a34a; }
        .pri-chip.active-pri.pri-medium   { background: #d97706; color: #fff; border-color: #d97706; }
        .pri-chip.active-pri.pri-high     { background: #ea580c; color: #fff; border-color: #ea580c; }
        .pri-chip.active-pri.pri-critical { background: #dc2626; color: #fff; border-color: #dc2626; }

        #ticket-submit-btn:disabled { opacity: 0.4; cursor: not-allowed; }

        #ticket-title:focus, #ticket-desc:focus,
        #ticket-contact-name:focus, #ticket-contact-email:focus, #ticket-contact-phone:focus {
            border-color: #fb923c !important;
            box-shadow: 0 0 0 3px rgba(251,146,60,0.15);
        }
    </style>
    @endpush

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script>
    $(document).ready(function () {

        {{-- Renamed from isSuperAdmin → hasActionRole to accurately reflect the two-role check --}}
        var hasActionRole = {{ auth()->user()->hasAnyRole(['Super Admin', 'Location Users']) ? 'true' : 'false' }};

        var columns = [
            {
                className      : 'dt-control',
                orderable      : false,
                data           : null,
                defaultContent : '',
                responsivePriority: 1,
                render: function () {
                    return '<div class="flex justify-center"><svg class="w-4 h-4 text-slate-400 cursor-pointer hover:text-orange-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg></div>';
                }
            },
            { data: 'DT_RowIndex',   name: 'DT_RowIndex',   orderable: false, searchable: false, className: 'px-2 min-tablet' },
            { data: 'location_name', name: 'location.name', className: 'px-3 min-desktop' },
            { data: 'code',          name: 'code',          className: 'px-3 text-[11px] font-mono font-bold text-slate-600 all', responsivePriority: 2 },
            {
                data: 'equipment', name: 'equipment',
                className: 'px-3 all', responsivePriority: 3,
                render: function (data) {
                    if (!data) return '';
                    if (data.length > 40) {
                        return '<div class="equipment-cell text-[12px] leading-tight">'
                             + '<span class="equipment-truncated font-semibold text-slate-700">' + data.substr(0, 40) + '...</span>'
                             + '<span class="equipment-full hidden font-semibold text-slate-700 text-wrap">' + data + '</span>'
                             + '<button onclick="toggleEquipment(this)" class="block text-[9px] font-bold text-orange-500 hover:text-orange-600 uppercase tracking-tighter mt-0.5">Read More</button>'
                             + '</div>';
                    }
                    return '<div class="font-semibold text-slate-700 text-[12px] leading-tight">' + data + '</div>';
                }
            },
            {
                data: 'qty', name: 'qty', className: 'px-3 min-tablet',
                render: function (data, type, row) {
                    return '<div class="flex flex-col items-start leading-none"><span class="font-bold text-sm text-slate-800">' + (data || 0) + '</span><span class="text-[9px] text-slate-400 font-bold uppercase tracking-tighter">' + (row.uom || '') + '</span></div>';
                }
            },
            {
                data: 'serviced_date', name: 'serviced_date', className: 'px-3 min-tablet all'
            },
            {
                data: 'status', name: 'status',
                className: 'px-3 text-center all', responsivePriority: 2,
                render: function (data, type, row) {
                    var statusText = data || 'operational';
                    var color = statusText === 'operational' ? 'bg-green-100 text-green-700 border-green-200' : 'bg-rose-100 text-rose-700 border-rose-200';
                    return '<button onclick="showStatusReason(this, \'' + (row.status_reason ? row.status_reason.replace(/'/g, "\\'") : 'Condition optimal.') + '\')" class="px-2 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-tighter border ' + color + '">' + statusText + '</button>';
                }
            },
        ];

        if (hasActionRole) {
            columns.push({ data: 'action', name: 'action', orderable: false, searchable: false, className: 'px-4 text-right all', responsivePriority: 1 });
        }

        var table = $('#item-master-table').DataTable({
            processing : true,
            serverSide : true,
            responsive : true,
            dom        : '<"flex flex-col md:flex-row justify-between items-center mb-4"fl>rtip',
            ajax: {
                url : "{{ route('item-masters.index') }}",
                data: function (d) { d.location_id = $('#location_filter').val(); }
            },
            columns: columns,
            language: {
                search            : '',
                searchPlaceholder : 'Search items…',
                lengthMenu        : 'Show _MENU_ items'
            }
        });

        $('#location_filter').on('change', function () { table.draw(); });

        $('#item-master-table tbody').on('click', 'td.dt-control', function () {
            var tr  = $(this).closest('tr');
            var row = table.row(tr);
            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('shown');
            } else {
                row.child(formatItemDetails(row.data())).show();
                tr.addClass('shown');
            }
        });

        $('#item-master-table tbody').on('click', '.btn-raise-ticket', function () {
            var raw = $(this).attr('data-item');
            try {
                openTicketModal(JSON.parse(raw));
            } catch (e) {
                console.error('Could not parse item data:', e, raw);
            }
        });
    });

    function formatItemDetails(d) {
        return `
            <div class="p-6 bg-slate-50 border-y border-slate-100 shadow-inner">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <div>
                            <h4 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Detailed Equipment Description</h4>
                            <p class="text-sm text-slate-700 leading-relaxed font-medium bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">${d.equipment}</p>
                        </div>
                        <div>
                            <h4 class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Remarks / Additional Information</h4>
                            <p class="text-sm text-slate-600 leading-relaxed italic bg-white/50 p-4 rounded-2xl border border-slate-200/50">
                                ${d.remarks || '<span class="text-slate-300">No remarks provided.</span>'}
                            </p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="p-5 rounded-3xl ${d.status === 'operational' ? 'bg-green-50/50 border-green-100' : 'bg-rose-50/50 border-rose-100'} border shadow-sm">
                            <h4 class="text-[10px] font-bold ${d.status === 'operational' ? 'text-green-600' : 'text-rose-600'} uppercase tracking-widest mb-3 flex items-center">
                                <span class="w-2 h-2 rounded-full ${d.status === 'operational' ? 'bg-green-500' : 'bg-rose-500'} mr-2 animate-pulse"></span>
                                Current Status Reason
                            </h4>
                            <p class="text-sm font-bold text-slate-800 bg-white p-3 rounded-xl border border-slate-100">
                                ${d.status_reason || 'System indicates optimal working condition.'}
                            </p>
                        </div>
                        <div class="flex gap-4">
                            <div class="flex-1 p-4 rounded-2xl bg-white border border-slate-200 shadow-sm">
                                <span class="block text-[10px] font-bold text-slate-400 uppercase mb-1">Stock ID</span>
                                <span class="text-xs font-mono font-bold text-slate-700">${d.code}</span>
                            </div>
                            <div class="flex-1 p-4 rounded-2xl bg-white border border-slate-200 shadow-sm">
                                <span class="block text-[10px] font-bold text-slate-400 uppercase mb-1">Serial Number</span>
                                <span class="text-xs font-mono font-bold text-slate-700">${d.serial_no || 'NA'}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
    }

    function toggleEquipment(btn) {
        const cell  = btn.closest('.equipment-cell');
        const trunc = cell.querySelector('.equipment-truncated');
        const full  = cell.querySelector('.equipment-full');
        if (full.classList.contains('hidden')) {
            full.classList.remove('hidden'); trunc.classList.add('hidden'); btn.textContent = 'Read Less';
        } else {
            full.classList.add('hidden'); trunc.classList.remove('hidden'); btn.textContent = 'Read More';
        }
    }

    function showStatusReason(btn, reason) {
        document.getElementById('status-modal-reason').textContent = reason || 'Condition optimal.';
        document.getElementById('status-modal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeStatusModal() {
        document.getElementById('status-modal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function exportItemMaster() {
        var locId = $('#location_filter').val();
        var url   = "{{ route('item-masters.export') }}";
        if (locId) url += '?location_id=' + locId;
        window.location.href = url;
    }

    /* ================================================================
       TICKET MODAL
    ================================================================ */
    var ticketItemData  = {};
    var ticketPriority  = 'medium';
    var ticketIssueType = 'damage';

    function openTicketModal(item) {
        ticketItemData = item;
        document.getElementById('modal-code').textContent      = item.code      || '';
        document.getElementById('modal-serial').textContent    = item.serial_no || '';
        document.getElementById('modal-equipment').textContent = item.equipment || '';
        document.getElementById('modal-location').textContent  = item.location  || '';
        document.getElementById('modal-qty').textContent       = (item.qty || '') + ' ' + (item.uom || '');
        document.getElementById('ticket-item-id').value        = item.id;
        document.getElementById('ticket-title').value          = 'Issue with ' + item.code + ' – ' + item.equipment;
        validateTicket();

        var overlay = document.getElementById('ticket-modal-overlay');
        var modal   = document.getElementById('ticket-modal');
        overlay.style.display     = 'flex';
        document.body.style.overflow = 'hidden';
        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                modal.style.transform = 'scale(1)';
                modal.style.opacity   = '1';
            });
        });
    }

    function closeTicketModal() {
        var modal = document.getElementById('ticket-modal');
        modal.style.transform = 'scale(0.92)';
        modal.style.opacity   = '0';
        setTimeout(function () {
            document.getElementById('ticket-modal-overlay').style.display = 'none';
            document.body.style.overflow = '';
            resetTicketModal();
        }, 220);
    }

    document.getElementById('ticket-modal-overlay').addEventListener('click', function (e) {
        if (e.target === this) closeTicketModal();
    });

    function toggleStatusReason() {
        var status = document.querySelector('input[name="equipment_status"]:checked').value;
        document.getElementById('equipment-status-reason-container').style.display =
            status === 'non-operational' ? 'block' : 'none';
    }

    function setIssueType(el) {
        document.querySelectorAll('.issue-chip').forEach(function (b) { b.classList.remove('active-chip'); });
        el.classList.add('active-chip');
        ticketIssueType = el.dataset.val;
    }

    function setTicketPriority(el) {
        document.querySelectorAll('.pri-chip').forEach(function (b) { b.classList.remove('active-pri'); });
        el.classList.add('active-pri');
        ticketPriority = el.dataset.val;
    }

    function countTicketChars() {
        document.getElementById('ticket-char-count').textContent =
            document.getElementById('ticket-desc').value.length + ' / 1000';
    }

    function validateTicket() {
        var title    = document.getElementById('ticket-title').value.trim();
        var desc     = document.getElementById('ticket-desc').value.trim();
        var cName    = document.getElementById('ticket-contact-name').value.trim();
        var cEmail   = document.getElementById('ticket-contact-email').value.trim();
        var cPhone   = document.getElementById('ticket-contact-phone').value.trim();
        var eqStatus = document.querySelector('input[name="equipment_status"]:checked')?.value || 'operational';
        var eqReason = document.getElementById('equipment-status-reason').value.trim();

        var ok = title && desc && cName && cEmail && cPhone;
        if (eqStatus === 'non-operational' && !eqReason) ok = false;

        document.getElementById('ticket-submit-btn').disabled = !ok;
        document.getElementById('ticket-hint').textContent    = ok ? '✓ Ready to submit' : 'Fill in all required fields';
    }

    function handleImageSelect(input) {
        var nameSpan = document.getElementById('ticket-image-name');
        var errSpan  = document.getElementById('ticket-image-error');
        var preview  = document.getElementById('ticket-image-preview');
        var prevCont = document.getElementById('ticket-image-preview-container');
        var container= document.getElementById('ticket-image-container');

        errSpan.style.display  = 'none';
        container.style.border = '1.5px dashed #cbd5e1';

        if (input.files && input.files[0]) {
            var file = input.files[0];
            if (file.size > 2 * 1024 * 1024) {
                errSpan.textContent    = 'File too large (Max 2MB). Selected: ' + (file.size/(1024*1024)).toFixed(2) + 'MB';
                errSpan.style.display  = 'block';
                container.style.border = '1.5px dashed #f43f5e';
                input.value            = '';
                nameSpan.textContent   = 'Click to upload or drag & drop';
                nameSpan.style.color   = '#94a3b8';
                prevCont.style.display = 'none';
                return;
            }
            var reader = new FileReader();
            reader.onload = function (e) { preview.src = e.target.result; prevCont.style.display = 'block'; };
            reader.readAsDataURL(file);
            nameSpan.textContent = file.name;
            nameSpan.style.color = '#1e293b';
        } else {
            nameSpan.textContent   = 'Click to upload or drag & drop';
            nameSpan.style.color   = '#94a3b8';
            prevCont.style.display = 'none';
        }
    }

    function removeSelectedImage() {
        var input = document.getElementById('ticket-image');
        input.value = '';
        handleImageSelect(input);
    }

    function submitTicket() {
        var title    = document.getElementById('ticket-title').value.trim();
        var desc     = document.getElementById('ticket-desc').value.trim();
        var cName    = document.getElementById('ticket-contact-name').value.trim();
        var cEmail   = document.getElementById('ticket-contact-email').value.trim();
        var cPhone   = document.getElementById('ticket-contact-phone').value.trim();
        var itemId   = document.getElementById('ticket-item-id').value;
        var eqStatus = document.querySelector('input[name="equipment_status"]:checked')?.value || 'operational';
        var eqReason = document.getElementById('equipment-status-reason').value.trim();
        var btn      = document.getElementById('ticket-submit-btn');

        btn.disabled    = true;
        btn.textContent = 'Submitting…';

        var formData = new FormData();
        formData.append('item_master_id',           itemId);
        formData.append('title',                    title);
        formData.append('issue_type',               ticketIssueType);
        formData.append('priority',                 ticketPriority);
        formData.append('description',              desc);
        formData.append('contact_name',             cName);
        formData.append('contact_email',            cEmail);
        formData.append('contact_phone',            cPhone);
        formData.append('equipment_status',         eqStatus);
        formData.append('equipment_status_reason',  eqReason);
        var imageFile = document.getElementById('ticket-image').files[0];
        if (imageFile) formData.append('image', imageFile);

        fetch('{{ route("tickets.store") }}', {
            method : 'POST',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
            body   : formData,
        })
        .then(function (r) { return r.json(); })
        .then(function (data) {
            if (!data.success) {
                alert('Failed to submit ticket. Server said: ' + (data.message || 'unknown error'));
                btn.disabled    = false;
                btn.textContent = 'Submit ticket';
                return;
            }

            var rows = [
                ['Ticket ref',        data.ref],
                ['Item code',         ticketItemData.code],
                ['Equipment',         ticketItemData.equipment],
                ['Location',          ticketItemData.location],
                ['Issue type',        ticketIssueType.charAt(0).toUpperCase() + ticketIssueType.slice(1)],
                ['Priority',          ticketPriority.charAt(0).toUpperCase() + ticketPriority.slice(1)],
                ['Contact Name',      cName],
                ['Contact Email',     cEmail],
                ['Contact Phone',     cPhone],
                ['Equipment Status',  eqStatus.charAt(0).toUpperCase() + eqStatus.slice(1)],
            ];

            document.getElementById('ticket-summary-card').innerHTML = rows.map(function (r) {
                return '<div style="display:flex;justify-content:space-between;padding:0.375rem 0;border-bottom:1px solid #f1f5f9;">'
                     + '<span style="color:#94a3b8;">' + r[0] + '</span>'
                     + '<span style="font-weight:600;color:#1e293b;">' + (r[1] || '—') + '</span>'
                     + '</div>';
            }).join('');

            document.getElementById('ticket-success-msg').textContent =
                data.ref + ' created for item ' + ticketItemData.code + '.';

            document.getElementById('ticket-form-view').style.display    = 'none';
            document.getElementById('ticket-success-view').style.display = 'flex';

            if (typeof window.notifTicketSubmitted === 'function' && data.ticket) {
                window.notifTicketSubmitted(data.ticket);
            }

            btn.disabled    = false;
            btn.textContent = 'Submit ticket';
        })
        .catch(function () {
            alert('Network error — check your connection and try again.');
            btn.disabled    = false;
            btn.textContent = 'Submit ticket';
        });
    }

    function resetTicketModal() {
        document.getElementById('ticket-form-view').style.display    = 'block';
        document.getElementById('ticket-success-view').style.display = 'none';
        document.getElementById('ticket-title').value                = '';
        document.getElementById('ticket-desc').value                 = '';
        document.getElementById('ticket-contact-name').value         = "{{ auth()->user()->name }}";
        document.getElementById('ticket-contact-email').value        = "{{ auth()->user()->email }}";
        document.getElementById('ticket-contact-phone').value        = "{{ auth()->user()->phone }}";
        document.getElementById('ticket-char-count').textContent     = '0 / 1000';
        document.getElementById('ticket-image').value                = '';
        document.getElementById('ticket-image-name').textContent     = 'Click to upload or drag & drop';
        document.getElementById('ticket-image-name').style.color     = '#94a3b8';
        document.getElementById('ticket-image-preview-container').style.display = 'none';

        document.querySelectorAll('.issue-chip').forEach(function (b) { b.classList.remove('active-chip'); });
        document.querySelector('.issue-chip[data-val="damage"]').classList.add('active-chip');

        document.querySelectorAll('.pri-chip').forEach(function (b) { b.classList.remove('active-pri'); });
        document.querySelector('.pri-chip[data-val="medium"]').classList.add('active-pri');

        var eqOp = document.querySelector('input[name="equipment_status"][value="operational"]');
        if (eqOp) eqOp.checked = true;
        document.getElementById('equipment-status-reason').value              = '';
        document.getElementById('equipment-status-reason-container').style.display = 'none';

        ticketPriority  = 'medium';
        ticketIssueType = 'damage';
        validateTicket();
    }
    </script>
    @endpush
</x-app-layout>