<style>
    .ims-topbar {
        position: sticky;
        top: 0;
        z-index: 1050;
        width: 100%;
        background: linear-gradient(105deg, #1769e8 0%, #1556c0 100%);
        box-shadow: 0 4px 18px rgba(20, 75, 160, .18);
    }
    .ims-topbar-inner {
        width: min(1320px, calc(100% - 32px));
        min-height: 72px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .ims-menu-trigger {
        width: 44px;
        height: 44px;
        flex: 0 0 44px;
        display: grid;
        place-items: center;
        border: 1px solid rgba(255,255,255,.34);
        border-radius: 12px;
        background: rgba(255,255,255,.12);
        color: #fff;
        font-size: 28px;
        line-height: 1;
        cursor: pointer;
        transition: background .18s ease, transform .18s ease;
    }
    .ims-menu-trigger:hover,
    .ims-menu-trigger[aria-expanded="true"] {
        background: rgba(255,255,255,.24);
        transform: translateY(-1px);
    }
    .ims-menu-trigger:focus-visible,
    .ims-drawer a:focus-visible,
    .ims-drawer button:focus-visible {
        outline: 3px solid #9fc5ff;
        outline-offset: 2px;
    }
    .ims-topbar-brand {
        color: #fff;
        text-decoration: none;
        font-size: 20px;
        font-weight: 700;
        white-space: nowrap;
    }
    .ims-topbar-user {
        margin-left: auto;
        color: rgba(255,255,255,.9);
        font-size: 14px;
        font-weight: 600;
        white-space: nowrap;
    }
    .ims-drawer-layer[hidden] {
        display: none !important;
    }
    .ims-drawer-layer {
        position: fixed;
        inset: 0;
        z-index: 1060;
    }
    body.ims-menu-open {
        overflow: hidden;
    }
    .ims-drawer-scrim {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        border: 0;
        background: rgba(12, 27, 54, .48);
        opacity: 0;
        transition: opacity .2s ease;
    }
    .ims-drawer {
        position: absolute;
        inset: 0 auto 0 0;
        width: min(340px, calc(100vw - 48px));
        display: flex;
        flex-direction: column;
        background: #fff;
        color: #172b4d;
        box-shadow: 18px 0 45px rgba(16, 36, 68, .22);
        transform: translateX(-102%);
        transition: transform .22s ease;
    }
    .ims-drawer-layer.is-open .ims-drawer-scrim {
        opacity: 1;
    }
    .ims-drawer-layer.is-open .ims-drawer {
        transform: translateX(0);
    }
    .ims-drawer-head {
        padding: 22px 20px 18px;
        color: #fff;
        background: linear-gradient(120deg, #173a7b, #1769e8);
    }
    .ims-drawer-title {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
    }
    .ims-drawer-subtitle {
        margin: 5px 0 0;
        color: rgba(255,255,255,.82);
        font-size: 13px;
        overflow-wrap: anywhere;
    }
    .ims-drawer-close {
        position: absolute;
        top: 17px;
        right: 16px;
        width: 36px;
        height: 36px;
        display: grid;
        place-items: center;
        border: 1px solid rgba(255,255,255,.35);
        border-radius: 10px;
        background: rgba(255,255,255,.12);
        color: #fff;
        font-size: 22px;
        line-height: 1;
    }
    .ims-drawer-section-label {
        padding: 18px 20px 7px;
        color: #75839a;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
    }
    .ims-drawer-nav {
        display: grid;
        gap: 4px;
        padding: 0 12px 16px;
        overflow-y: auto;
    }
    .ims-drawer-link {
        min-height: 46px;
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 12px;
        border-radius: 10px;
        color: #324563;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
    }
    .ims-drawer-link:hover {
        background: #f1f6ff;
        color: #1556c0;
    }
    .ims-drawer-link.active {
        background: #eaf2ff;
        color: #145cc8;
    }
    .ims-drawer-icon {
        width: 22px;
        color: #3976cf;
        font-size: 17px;
        text-align: center;
    }
    .ims-drawer-foot {
        margin-top: auto;
        padding: 14px 16px 18px;
        border-top: 1px solid #e8edf4;
    }
    .ims-drawer-signout {
        width: 100%;
        min-height: 44px;
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 12px;
        border: 0;
        border-radius: 10px;
        background: #fff2f1;
        color: #b42318;
        font: inherit;
        font-size: 14px;
        font-weight: 700;
        text-align: left;
        cursor: pointer;
    }
    .ims-drawer-signout:hover {
        background: #ffe2df;
    }
    @media (max-width: 520px) {
        .ims-topbar-inner {
            width: calc(100% - 20px);
            min-height: 64px;
            gap: 12px;
        }
        .ims-topbar-brand {
            font-size: 17px;
        }
        .ims-topbar-user {
            display: none;
        }
    }
</style>

<nav class="ims-topbar" aria-label="Application">
    <div class="ims-topbar-inner">
        <button type="button" class="ims-menu-trigger" aria-label="Open application menu" aria-controls="ims-app-drawer" aria-expanded="false">
            <span aria-hidden="true">⋮</span>
        </button>
        <a class="ims-topbar-brand" href="{{ auth()->check() ? route('dashboard') : route('login') }}">Invoice Management System</a>
        @auth
            <span class="ims-topbar-user">{{ auth()->user()->name }}</span>
        @endauth
    </div>
</nav>

<div class="ims-drawer-layer" id="ims-app-drawer" hidden>
    <button type="button" class="ims-drawer-scrim" data-ims-menu-close aria-label="Close application menu"></button>
    <aside class="ims-drawer" role="dialog" aria-modal="true" aria-labelledby="ims-drawer-title" tabindex="-1">
        <header class="ims-drawer-head">
            <h2 class="ims-drawer-title" id="ims-drawer-title">Invoice workspace</h2>
            @auth
                <p class="ims-drawer-subtitle">{{ auth()->user()->name }}<br>{{ auth()->user()->email }}</p>
            @else
                <p class="ims-drawer-subtitle">Sign in to manage your invoices and records.</p>
            @endauth
            <button type="button" class="ims-drawer-close" data-ims-menu-close aria-label="Close menu">&times;</button>
        </header>

        @auth
            <div class="ims-drawer-section-label">Workspace</div>
            <nav class="ims-drawer-nav" aria-label="Workspace links">
                <a class="ims-drawer-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}"><span class="ims-drawer-icon" aria-hidden="true">⌂</span>Home</a>
                <a class="ims-drawer-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><span class="ims-drawer-icon" aria-hidden="true">⌂</span>Dashboard</a>
                <a class="ims-drawer-link {{ request()->routeIs('customers.*') ? 'active' : '' }}" href="{{ route('customers.index') }}"><span class="ims-drawer-icon" aria-hidden="true">♙</span>Customers</a>
                <a class="ims-drawer-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}"><span class="ims-drawer-icon" aria-hidden="true">▦</span>Products</a>
                <a class="ims-drawer-link {{ request()->routeIs('invoices.*') ? 'active' : '' }}" href="{{ route('invoices.index') }}"><span class="ims-drawer-icon" aria-hidden="true">▤</span>Invoices</a>
                <a class="ims-drawer-link {{ request()->routeIs('reports.*') ? 'active' : '' }}" href="{{ route('reports.index') }}"><span class="ims-drawer-icon" aria-hidden="true">◷</span>Reports</a>
            </nav>
            <div class="ims-drawer-section-label">Account</div>
            <nav class="ims-drawer-nav" aria-label="Account links">
                <a class="ims-drawer-link {{ request()->routeIs('settings.*') ? 'active' : '' }}" href="{{ route('settings.edit') }}"><span class="ims-drawer-icon" aria-hidden="true">⚙</span>Settings</a>
            </nav>
            <div class="ims-drawer-foot">
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="ims-drawer-signout"><span class="ims-drawer-icon" aria-hidden="true">↪</span>Sign out</button>
                </form>
            </div>
        @else
            <div class="ims-drawer-section-label">Account</div>
            <nav class="ims-drawer-nav" aria-label="Sign-in links">
                <a class="ims-drawer-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}"><span class="ims-drawer-icon" aria-hidden="true">⌂</span>Home</a>
                <a class="ims-drawer-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}"><span class="ims-drawer-icon" aria-hidden="true">↪</span>Sign in</a>
                @if (request()->routeIs('register') || ($canRegister ?? false))
                    <a class="ims-drawer-link {{ request()->routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}"><span class="ims-drawer-icon" aria-hidden="true">＋</span>Create account</a>
                @endif
            </nav>
        @endauth
    </aside>
</div>

<script>
    (() => {
        const trigger = document.querySelector('.ims-menu-trigger');
        const layer = document.getElementById('ims-app-drawer');
        const drawer = layer?.querySelector('.ims-drawer');

        if (!trigger || !layer || !drawer) return;

        const closeMenu = () => {
            layer.classList.remove('is-open');
            trigger.setAttribute('aria-expanded', 'false');
            trigger.setAttribute('aria-label', 'Open application menu');
            document.body.classList.remove('ims-menu-open');
            window.setTimeout(() => { layer.hidden = true; }, 220);
            trigger.focus();
        };

        trigger.addEventListener('click', () => {
            if (!layer.hidden) {
                closeMenu();
                return;
            }

            layer.hidden = false;
            trigger.setAttribute('aria-expanded', 'true');
            trigger.setAttribute('aria-label', 'Close application menu');
            document.body.classList.add('ims-menu-open');
            window.requestAnimationFrame(() => {
                layer.classList.add('is-open');
                drawer.focus();
            });
        });

        layer.addEventListener('click', (event) => {
            if (event.target.closest('[data-ims-menu-close]')) closeMenu();
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && !layer.hidden) closeMenu();
        });
    })();
</script>



