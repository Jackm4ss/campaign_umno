  <script>
    window.__TBA_ADMIN_SYNC__ = @json(\App\Http\Controllers\AdminSyncController::payload());
    window.__TBA_SYNC_URL__ = "{{ route('admin.sync.store') }}";
    window.__TBA_CSRF__ = "{{ csrf_token() }}";
    window.__TBA_ADMIN_EMAIL__ = @json(auth()->user()->email);
    (function hydrateAdminLocalState(){
      const originalSetItem = localStorage.setItem.bind(localStorage);
      const data = window.__TBA_ADMIN_SYNC__ || {};
      Object.keys(data).forEach(key => {
        if (data[key] === null || data[key] === undefined) return;
        try { originalSetItem(key, JSON.stringify(data[key])); } catch (error) {}
      });
      window.tbaSyncAdminState = function(key, value) {
        if (!key) return;
        try { originalSetItem(key, JSON.stringify(value)); } catch (error) {}
        fetch(window.__TBA_SYNC_URL__, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': window.__TBA_CSRF__,
          },
          body: JSON.stringify({ key, value }),
          credentials: 'same-origin',
        }).catch(() => {});
      };
      localStorage.setItem = function(key, value) {
        originalSetItem(key, value);
        if (['tbaCmsFrontpageData','tbaSettings','tbaAccountProfile','tbaAdminMembers','tbaAdminEvents','tbaAdminArticles','tbaAdminGallery','tbaAdminLeaders'].includes(key)) {
          try { window.tbaSyncAdminState(key, JSON.parse(value)); } catch (error) {}
        }
      };
    })();
