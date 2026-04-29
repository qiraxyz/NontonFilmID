<header style="padding:14px 32px;display:flex;align-items:center;justify-content:space-between;gap:16px;border-bottom:1px solid var(--border);position:sticky;top:0;background:rgba(241,245,249,0.88);backdrop-filter:blur(16px);z-index:30;">
    <div style="display:flex;align-items:center;gap:12px;">
        <button class="sidebar-toggle" onclick="toggleSidebar()" aria-label="Toggle sidebar">
            <i class="fa-solid fa-bars" style="font-size:14px;"></i>
        </button>
    </div>
    <div style="display:flex;align-items:center;gap:12px;">
        <!-- <div style="width:1px;height:24px;background:var(--border);"></div> -->
        <span style="font-size:12px;color:var(--fg-muted);" id="currentDate"></span>
        <div style="position:relative;">
            <i class="fa-solid fa-bell" style="font-size:16px;color:var(--fg-muted);cursor:pointer;transition:color 0.2s;" onmouseover="this.style.color='var(--fg)'" onmouseout="this.style.color='var(--fg-muted)'"></i>
            <div style="position:absolute;top:-4px;right:-4px;width:8px;height:8px;background:var(--rose);border-radius:50%;border:2px solid var(--bg);"></div>
        </div>
    </div>
</header>