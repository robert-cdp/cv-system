<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>POS — Sistema de Ventas</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

<style>
:root {
    --bg:          #0f1117;
    --surface:     #181c27;
    --surface-2:   #1e2333;
    --surface-3:   #252b3b;
    --border:      #2a3045;
    --border-2:    #333c52;
    --accent:      #3b82f6;
    --accent-glow: rgba(59,130,246,.25);
    --accent-2:    #22d3ee;
    --green:       #22c55e;
    --green-dim:   rgba(34,197,94,.12);
    --red:         #f87171;
    --red-dim:     rgba(248,113,113,.12);
    --text-1: #f1f5f9;
    --text-2: #94a3b8;
    --text-3: #4b5c78;
    --radius:    14px;
    --radius-sm:  8px;
    --radius-lg: 20px;
    --font: 'DM Sans', sans-serif;
    --mono: 'DM Mono', monospace;
    --shadow: 0 4px 24px rgba(0,0,0,.4);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html, body { height: 100%; overflow: hidden; }
body { font-family: var(--font); background: var(--bg); color: var(--text-1); font-size: 14px; line-height: 1.5; }

.topbar {
    height: 56px;
    background: var(--surface);
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    padding: 0 20px;
    gap: 12px;
    position: relative;
    z-index: 10;
}

.topbar-brand { display: flex; align-items: center; gap: 10px; flex: 1; }

.topbar-brand .dot {
    width: 8px; height: 8px;
    border-radius: 50%;
    background: var(--green);
    box-shadow: 0 0 8px var(--green);
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%,100% { opacity:1; transform:scale(1); }
    50% { opacity:.6; transform:scale(.85); }
}

.topbar-title { font-size: 15px; font-weight: 600; color: var(--text-1); }
.topbar-sub { font-size: 11px; font-weight: 400; color: var(--text-3); margin-left: 2px; }
.topbar-actions { display: flex; gap: 8px; }

.tb-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    border-radius: var(--radius-sm);
    border: 1px solid var(--border);
    background: transparent;
    color: var(--text-2);
    font-family: var(--font);
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    transition: all .18s ease;
}

.tb-btn:hover { background: var(--surface-2); border-color: var(--border-2); color: var(--text-1); }
.tb-btn.danger:hover { background: var(--red-dim); border-color: var(--red); color: var(--red); }

.pos-layout {
    display: grid;
    grid-template-columns: 1fr 360px;
    height: calc(100vh - 56px);
    gap: 0;
}

.products-panel { display: flex; flex-direction: column; background: var(--bg); overflow: hidden; }

.products-toolbar {
    padding: 16px 20px 12px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    border-bottom: 1px solid var(--border);
    background: var(--surface);
}

.search-wrap { position: relative; }

.search-wrap svg {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-3);
    pointer-events: none;
}

.search-input {
    width: 100%;
    padding: 9px 12px 9px 38px;
    border-radius: var(--radius-sm);
    border: 1px solid var(--border);
    background: var(--surface-3);
    color: var(--text-1);
    font-family: var(--font);
    font-size: 13px;
    outline: none;
    transition: border-color .18s;
}

.search-input::placeholder { color: var(--text-3); }
.search-input:focus { border-color: var(--accent); box-shadow: 0 0 0 3px var(--accent-glow); }

.categories { display: flex; gap: 6px; overflow-x: auto; padding-bottom: 2px; scrollbar-width: none; }
.categories::-webkit-scrollbar { display: none; }

.cat-btn {
    flex-shrink: 0;
    padding: 5px 14px;
    border-radius: 20px;
    border: 1px solid var(--border);
    background: transparent;
    color: var(--text-2);
    font-family: var(--font);
    font-size: 12px;
    font-weight: 500;
    cursor: pointer;
    transition: all .18s ease;
    white-space: nowrap;
}

.cat-btn:hover { border-color: var(--border-2); color: var(--text-1); background: var(--surface-3); }
.cat-btn.active { background: var(--accent); border-color: var(--accent); color: #fff; }

.products-scroll {
    flex: 1;
    overflow-y: auto;
    padding: 20px;
    scrollbar-width: thin;
    scrollbar-color: var(--border) transparent;
}

.products-scroll::-webkit-scrollbar { width: 4px; }
.products-scroll::-webkit-scrollbar-track { background: transparent; }
.products-scroll::-webkit-scrollbar-thumb { background: var(--border); border-radius: 4px; }

.products-count { font-size: 11px; color: var(--text-3); margin-bottom: 16px; font-variant-numeric: tabular-nums; }

.category-section { margin-bottom: 28px; }
.category-section:last-child { margin-bottom: 0; }

.category-section-header { display: flex; align-items: center; gap: 10px; margin-bottom: 12px; }

.category-section-title {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--text-3);
    white-space: nowrap;
}

.category-section-line { flex: 1; height: 1px; background: var(--border); }

.products-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(148px, 1fr)); gap: 10px; }

.product-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 14px 12px;
    cursor: pointer;
    transition: all .18s ease;
    position: relative;
    overflow: hidden;
    user-select: none;
}

.product-card::after {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 50% 0%, rgba(59,130,246,.08), transparent 70%);
    opacity: 0;
    transition: opacity .18s;
}

.product-card:hover { border-color: var(--accent); transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,.3), 0 0 0 1px var(--accent); }
.product-card:hover::after { opacity: 1; }
.product-card:active { transform: translateY(0); }

.product-name { font-size: 13px; font-weight: 600; color: var(--text-1); line-height: 1.3; margin-bottom: 8px; }

.product-price { font-family: var(--mono); font-size: 15px; font-weight: 500; color: var(--green); }

.product-add-hint {
    position: absolute;
    right: 8px;
    top: 8px;
    background: var(--accent);
    color: #fff;
    width: 20px; height: 20px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 700;
    opacity: 0;
    transform: scale(.7);
    transition: all .15s;
}

.product-card:hover .product-add-hint { opacity: 1; transform: scale(1); }

.empty-state { text-align: center; padding: 60px 20px; color: var(--text-3); }
.empty-state svg { margin-bottom: 12px; opacity: .4; }
.empty-state p { font-size: 14px; }

.cart-panel { display: flex; flex-direction: column; background: var(--surface); border-left: 1px solid var(--border); overflow: hidden; }

.cart-header { padding: 16px 20px 12px; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; }

.cart-header h2 { font-size: 15px; font-weight: 700; display: flex; align-items: center; gap: 8px; }

.cart-count-badge { background: var(--accent); color: #fff; font-size: 11px; font-weight: 700; padding: 1px 7px; border-radius: 20px; font-variant-numeric: tabular-nums; }

.cart-clear-btn { background: transparent; border: 1px solid var(--border); border-radius: var(--radius-sm); color: var(--text-3); font-family: var(--font); font-size: 11px; padding: 4px 10px; cursor: pointer; transition: all .18s; }
.cart-clear-btn:hover { background: var(--red-dim); border-color: var(--red); color: var(--red); }

.cart-items { flex: 1; overflow-y: auto; padding: 12px 16px; scrollbar-width: thin; scrollbar-color: var(--border) transparent; }
.cart-items::-webkit-scrollbar { width: 3px; }
.cart-items::-webkit-scrollbar-thumb { background: var(--border); }

.cart-empty { height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; color: var(--text-3); gap: 8px; }
.cart-empty svg { opacity: .3; }
.cart-empty p { font-size: 13px; }

.cart-item { background: var(--surface-2); border: 1px solid var(--border); border-radius: var(--radius); padding: 10px 12px; margin-bottom: 8px; animation: slideIn .2s ease; transition: border-color .18s; }

@keyframes slideIn {
    from { opacity:0; transform:translateX(12px); }
    to   { opacity:1; transform:translateX(0); }
}

.cart-item:hover { border-color: var(--border-2); }
.cart-item-top { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px; }
.cart-item-name { font-size: 13px; font-weight: 600; color: var(--text-1); line-height: 1.3; }
.cart-item-subtotal { font-family: var(--mono); font-size: 13px; font-weight: 500; color: var(--text-1); white-space: nowrap; margin-left: 8px; }
.cart-item-bottom { display: flex; align-items: center; justify-content: space-between; }
.cart-item-unit { font-size: 11px; color: var(--text-3); font-family: var(--mono); }
.qty-controls { display: flex; align-items: center; gap: 6px; }

.qty-btn { width: 24px; height: 24px; border-radius: 6px; border: 1px solid var(--border-2); background: var(--surface-3); color: var(--text-2); font-size: 15px; font-weight: 700; cursor: pointer; display: flex; align-items: center; justify-content: center; line-height: 1; transition: all .15s; user-select: none; }
.qty-btn:hover { background: var(--border-2); color: var(--text-1); }
.qty-btn.minus:hover { background: var(--red-dim); border-color: var(--red); color: var(--red); }
.qty-btn.plus:hover  { background: var(--green-dim); border-color: var(--green); color: var(--green); }

.qty-display { font-family: var(--mono); font-size: 13px; font-weight: 600; color: var(--text-1); min-width: 20px; text-align: center; }

.cart-item-remove { background: transparent; border: none; color: var(--text-3); cursor: pointer; font-size: 16px; line-height: 1; padding: 0 2px; transition: color .15s; }
.cart-item-remove:hover { color: var(--red); }

.cart-footer { padding: 16px 20px; border-top: 1px solid var(--border); display: flex; flex-direction: column; gap: 12px; }
.cart-summary { display: flex; flex-direction: column; gap: 6px; }
.summary-row { display: flex; justify-content: space-between; align-items: center; font-size: 12px; color: var(--text-2); }
.summary-row.total { font-size: 20px; font-weight: 700; color: var(--text-1); padding-top: 8px; border-top: 1px solid var(--border); }
.summary-row.total span:last-child { font-family: var(--mono); color: var(--accent-2); }

.sell-btn { width: 100%; padding: 14px; border: none; border-radius: var(--radius); background: var(--accent); color: #fff; font-family: var(--font); font-size: 15px; font-weight: 700; cursor: pointer; transition: all .18s; display: flex; align-items: center; justify-content: center; gap: 8px; box-shadow: 0 4px 20px rgba(59,130,246,.3); }
.sell-btn:hover { background: #2563eb; box-shadow: 0 6px 24px rgba(59,130,246,.45); transform: translateY(-1px); }
.sell-btn:active { transform: translateY(0); }
.sell-btn:disabled { opacity: .4; cursor: not-allowed; transform: none; box-shadow: none; }

.modal-overlay { position: fixed; inset: 0; background: rgba(0,0,0,.7); backdrop-filter: blur(6px); display: flex; align-items: center; justify-content: center; z-index: 100; opacity: 0; pointer-events: none; transition: opacity .22s ease; }
.modal-overlay.open { opacity: 1; pointer-events: all; }

.modal { background: var(--surface); border: 1px solid var(--border-2); border-radius: var(--radius-lg); padding: 28px 28px 24px; width: 380px; max-width: 95vw; box-shadow: 0 24px 60px rgba(0,0,0,.6); transform: scale(.94) translateY(10px); transition: transform .22s cubic-bezier(.34,1.56,.64,1); }
.modal-overlay.open .modal { transform: scale(1) translateY(0); }

.modal-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
.modal-title { font-size: 17px; font-weight: 700; }

.modal-close { background: var(--surface-3); border: 1px solid var(--border); border-radius: 8px; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; color: var(--text-2); cursor: pointer; font-size: 16px; transition: all .15s; }
.modal-close:hover { background: var(--red-dim); border-color: var(--red); color: var(--red); }

.modal-total-display { background: var(--surface-3); border: 1px solid var(--border); border-radius: var(--radius); padding: 16px 20px; text-align: center; margin-bottom: 20px; }
.modal-total-label { font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: var(--text-3); margin-bottom: 4px; }
.modal-total-amount { font-family: var(--mono); font-size: 32px; font-weight: 700; color: var(--accent-2); }

.modal-field { margin-bottom: 16px; }
.modal-label { font-size: 12px; font-weight: 600; color: var(--text-2); text-transform: uppercase; letter-spacing: .5px; margin-bottom: 6px; display: block; }

.modal-input { width: 100%; padding: 11px 14px; border-radius: var(--radius-sm); border: 1px solid var(--border-2); background: var(--surface-3); color: var(--text-1); font-family: var(--mono); font-size: 18px; font-weight: 600; outline: none; transition: border-color .18s, box-shadow .18s; }
.modal-input::placeholder { color: var(--text-3); font-size: 14px; font-family: var(--font); }
.modal-input:focus { border-color: var(--accent); box-shadow: 0 0 0 3px var(--accent-glow); }
.modal-input.error { border-color: var(--red); box-shadow: 0 0 0 3px rgba(248,113,113,.2); }

.modal-change { background: var(--surface-2); border: 1px solid var(--border); border-radius: var(--radius); padding: 12px 16px; display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; transition: all .2s; }
.modal-change.positive { background: var(--green-dim); border-color: var(--green); }
.modal-change.negative { background: var(--red-dim); border-color: var(--red); }
.modal-change-label { font-size: 12px; color: var(--text-2); font-weight: 500; }
.modal-change-amount { font-family: var(--mono); font-size: 18px; font-weight: 700; color: var(--text-3); transition: color .2s; }
.modal-change.positive .modal-change-amount { color: var(--green); }
.modal-change.negative .modal-change-amount { color: var(--red); }

.modal-error-msg { font-size: 12px; color: var(--red); margin-top: -10px; margin-bottom: 14px; display: none; }
.modal-error-msg.show { display: block; }

.modal-actions { display: flex; gap: 10px; }
.modal-btn { flex: 1; padding: 12px; border-radius: var(--radius-sm); border: none; font-family: var(--font); font-size: 14px; font-weight: 700; cursor: pointer; transition: all .18s; }
.modal-btn.cancel { background: var(--surface-3); border: 1px solid var(--border-2); color: var(--text-2); }
.modal-btn.cancel:hover { background: var(--surface-2); color: var(--text-1); }
.modal-btn.confirm { background: var(--green); color: #0a1a0a; box-shadow: 0 4px 16px rgba(34,197,94,.3); }
.modal-btn.confirm:hover { background: #16a34a; box-shadow: 0 6px 20px rgba(34,197,94,.4); transform: translateY(-1px); }
.modal-btn.confirm:disabled { opacity: .4; cursor: not-allowed; transform: none; box-shadow: none; }

.toast-container { position: fixed; bottom: 24px; right: 24px; z-index: 200; display: flex; flex-direction: column; gap: 8px; pointer-events: none; }

.toast { background: var(--surface-2); border: 1px solid var(--border-2); border-radius: var(--radius); padding: 12px 16px; display: flex; align-items: center; gap: 10px; box-shadow: var(--shadow); min-width: 260px; max-width: 340px; animation: toastIn .3s cubic-bezier(.34,1.56,.64,1) forwards; font-size: 13px; font-weight: 500; }

@keyframes toastIn {
    from { opacity:0; transform:translateX(20px) scale(.95); }
    to   { opacity:1; transform:translateX(0) scale(1); }
}

.toast.hide { animation: toastOut .25s ease forwards; }

@keyframes toastOut { to { opacity:0; transform:translateX(20px) scale(.95); } }

.toast.success { border-color: var(--green); }
.toast.error   { border-color: var(--red); }
.toast.info    { border-color: var(--accent); }
.toast-msg { color: var(--text-1); }

::-webkit-scrollbar { width: 4px; height: 4px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: var(--border); border-radius: 4px; }
</style>
</head>

<body>

<div class="topbar">
    <div class="topbar-brand">
        <span class="dot"></span>
        <span class="topbar-title">{{ config('app.name') }}</span>
        <span class="topbar-sub">/ Punto de Venta</span>
    </div>
    <div class="topbar-actions">
        <button class="tb-btn" onclick="window.history.back()">← Regresar</button>
    </div>
</div>

<div class="pos-layout">

    <div class="products-panel">
        <div class="products-toolbar">
            <div class="search-wrap">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <input class="search-input" type="text" id="searchInput" placeholder="Buscar producto..." oninput="filterProducts()">
            </div>
            <div class="categories" id="categoryBar">
                <button class="cat-btn active" data-cat="all" onclick="filterByCategory(this)">Todos</button>
                @foreach($categories as $category)
                <button class="cat-btn" data-cat="{{ $category->slug }}" onclick="filterByCategory(this)">{{ $category->name }}</button>
                @endforeach
            </div>
        </div>

        <div class="products-scroll">
            <div class="products-count" id="productsCount"></div>
            <div id="productsContainer">

                @foreach($categories as $category)
                @if($category->products->isNotEmpty())
                <div class="category-section" data-section="{{ $category->slug }}">
                    <div class="category-section-header">
                        <span class="category-section-title">{{ $category->name }}</span>
                        <span class="category-section-line"></span>
                    </div>
                    <div class="products-grid">
                        @foreach($category->products as $product)
                        <div class="product-card"
                             data-id="{{ $product->id }}"
                             data-name="{{ strtolower($product->name) }}"
                             data-price="{{ $product->price }}"
                             data-category="{{ $category->slug }}"
                             onclick="addToCart({{ $product->id }}, '{{ addslashes($product->name) }}', {{ $product->price }})">
                            <div class="product-name">{{ $product->name }}</div>
                            <div class="product-price">Q {{ number_format($product->price, 2) }}</div>
                            <div class="product-add-hint">+</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @endforeach

            </div>

            <div class="empty-state" id="emptyState" style="display:none;">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <p>No se encontraron productos</p>
            </div>
        </div>
    </div>

    <div class="cart-panel">
        <div class="cart-header">
            <h2>
                Carrito
                <span class="cart-count-badge" id="cartBadge">0</span>
            </h2>
            <button class="cart-clear-btn" onclick="clearCart()">Limpiar</button>
        </div>

        <div class="cart-items" id="cartItems">
            <div class="cart-empty" id="cartEmpty">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                    <line x1="3" y1="6" x2="21" y2="6"/>
                    <path d="M16 10a4 4 0 01-8 0"/>
                </svg>
                <p>El carrito está vacío</p>
            </div>
        </div>

        <div class="cart-footer">
            <div class="cart-summary">
                <div class="summary-row">
                    <span>Artículos</span>
                    <span id="totalItems">0 unidades</span>
                </div>
                <div class="summary-row total">
                    <span>Total</span>
                    <span>Q <span id="totalAmount">0.00</span></span>
                </div>
            </div>
            <button class="sell-btn" id="sellBtn" onclick="openPayModal()" disabled>Cobrar</button>
        </div>
    </div>

</div>

<div class="modal-overlay" id="payModal">
    <div class="modal">
        <div class="modal-header">
            <div class="modal-title">Confirmar Venta</div>
            <button class="modal-close" onclick="closePayModal()">✕</button>
        </div>
        <div class="modal-total-display">
            <div class="modal-total-label">Total a cobrar</div>
            <div class="modal-total-amount">Q <span id="modalTotal">0.00</span></div>
        </div>
        <div class="modal-field">
            <label class="modal-label" for="receivedInput">Monto recibido (Q)</label>
            <input class="modal-input" type="number" id="receivedInput" placeholder="0.00" step="0.01" min="0" oninput="calcChange()">
        </div>
        <p class="modal-error-msg" id="modalError">El monto recibido es menor al total.</p>
        <div class="modal-change" id="changeBox">
            <span class="modal-change-label">Cambio a devolver</span>
            <span class="modal-change-amount" id="changeAmount">Q 0.00</span>
        </div>
        <div class="modal-actions">
            <button class="modal-btn cancel" onclick="closePayModal()">Cancelar</button>
            <button class="modal-btn confirm" id="confirmBtn" onclick="confirmSale()" disabled>Confirmar venta</button>
        </div>
    </div>
</div>

<div class="toast-container" id="toastContainer"></div>

<script>
let cart = [];
let activeCategory = 'all';

function filterByCategory(btn) {
    document.querySelectorAll('.cat-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    activeCategory = btn.dataset.cat;
    filterProducts();
}

function filterProducts() {
    const query    = document.getElementById('searchInput').value.toLowerCase().trim();
    const sections = document.querySelectorAll('.category-section');
    let totalVisible = 0;
    let totalCards   = 0;

    sections.forEach(section => {
        const sectionCat = section.dataset.section;
        const cards      = section.querySelectorAll('.product-card');
        let sectionVisible = 0;
        totalCards += cards.length;

        cards.forEach(card => {
            const matchSearch = card.dataset.name.includes(query);
            const matchCat    = activeCategory === 'all' || sectionCat === activeCategory;

            if (matchSearch && matchCat) {
                card.style.display = '';
                sectionVisible++;
                totalVisible++;
            } else {
                card.style.display = 'none';
            }
        });

        section.style.display = sectionVisible > 0 ? '' : 'none';
    });

    document.getElementById('productsCount').textContent =
        totalVisible === totalCards
            ? `${totalCards} productos`
            : `${totalVisible} de ${totalCards} productos`;

    document.getElementById('emptyState').style.display = totalVisible === 0 ? '' : 'none';
}

function addToCart(id, name, price) {
    const existing = cart.find(i => i.product_id === id);
    if (existing) {
        existing.quantity++;
    } else {
        cart.push({ product_id: id, name, price, quantity: 1 });
    }
    renderCart();

    const card = document.querySelector(`.product-card[data-id="${id}"]`);
    if (card) {
        card.style.borderColor = 'var(--green)';
        card.style.boxShadow   = '0 0 0 2px var(--green-dim)';
        setTimeout(() => { card.style.borderColor = ''; card.style.boxShadow = ''; }, 400);
    }
}

function changeQty(id, delta) {
    const item = cart.find(i => i.product_id === id);
    if (!item) return;
    item.quantity += delta;
    if (item.quantity <= 0) cart = cart.filter(i => i.product_id !== id);
    renderCart();
}

function removeItem(id) {
    cart = cart.filter(i => i.product_id !== id);
    renderCart();
}

function clearCart() {
    if (cart.length === 0) return;
    cart = [];
    renderCart();
    showToast('info', 'Carrito vaciado');
}

function renderCart() {
    const container = document.getElementById('cartItems');
    const emptyEl   = document.getElementById('cartEmpty');
    let total = 0, totalItems = 0;

    container.querySelectorAll('.cart-item').forEach(el => el.remove());

    if (cart.length === 0) {
        emptyEl.style.display = '';
        updateFooter(0, 0);
        return;
    }

    emptyEl.style.display = 'none';

    cart.forEach(item => {
        const subtotal  = item.price * item.quantity;
        total          += subtotal;
        totalItems     += item.quantity;

        const div = document.createElement('div');
        div.className = 'cart-item';
        div.innerHTML = `
            <div class="cart-item-top">
                <div class="cart-item-name">${escapeHtml(item.name)}</div>
                <div class="cart-item-subtotal">Q ${subtotal.toFixed(2)}</div>
            </div>
            <div class="cart-item-bottom">
                <div class="cart-item-unit">Q ${item.price.toFixed(2)} c/u</div>
                <div class="qty-controls">
                    <button class="qty-btn minus" onclick="changeQty(${item.product_id}, -1)">−</button>
                    <span class="qty-display">${item.quantity}</span>
                    <button class="qty-btn plus" onclick="changeQty(${item.product_id}, 1)">+</button>
                    <button class="cart-item-remove" onclick="removeItem(${item.product_id})" title="Eliminar">✕</button>
                </div>
            </div>
        `;
        container.appendChild(div);
    });

    updateFooter(total, totalItems);
}

function updateFooter(total, totalItems) {
    document.getElementById('totalAmount').textContent = total.toFixed(2);
    document.getElementById('totalItems').textContent  = `${totalItems} unid.`;
    document.getElementById('cartBadge').textContent   = cart.length;
    document.getElementById('sellBtn').disabled        = cart.length === 0;
}

function openPayModal() {
    if (cart.length === 0) return;
    const total = cart.reduce((sum, i) => sum + i.price * i.quantity, 0);
    document.getElementById('modalTotal').textContent   = total.toFixed(2);
    document.getElementById('receivedInput').value      = '';
    document.getElementById('changeAmount').textContent = 'Q 0.00';
    document.getElementById('changeBox').className      = 'modal-change';
    document.getElementById('confirmBtn').disabled      = true;
    document.getElementById('modalError').classList.remove('show');
    document.getElementById('payModal').classList.add('open');
    setTimeout(() => document.getElementById('receivedInput').focus(), 250);
}

function closePayModal() {
    document.getElementById('payModal').classList.remove('open');
}

function calcChange() {
    const total    = parseFloat(document.getElementById('modalTotal').textContent) || 0;
    const received = parseFloat(document.getElementById('receivedInput').value) || 0;
    const change   = received - total;
    const changeBox  = document.getElementById('changeBox');
    const changeAmt  = document.getElementById('changeAmount');
    const confirmBtn = document.getElementById('confirmBtn');
    const errorMsg   = document.getElementById('modalError');
    const input      = document.getElementById('receivedInput');

    changeAmt.textContent = `Q ${Math.abs(change).toFixed(2)}`;

    if (received <= 0) {
        changeBox.className = 'modal-change';
        confirmBtn.disabled = true;
        errorMsg.classList.remove('show');
        input.classList.remove('error');
    } else if (change < 0) {
        changeBox.className = 'modal-change negative';
        confirmBtn.disabled = true;
        errorMsg.classList.add('show');
        input.classList.add('error');
    } else {
        changeBox.className = 'modal-change positive';
        confirmBtn.disabled = false;
        errorMsg.classList.remove('show');
        input.classList.remove('error');
    }
}

document.getElementById('payModal').addEventListener('click', function(e) {
    if (e.target === this) closePayModal();
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closePayModal();
});

function confirmSale() {
    const confirmBtn = document.getElementById('confirmBtn');
    confirmBtn.disabled    = true;
    confirmBtn.textContent = 'Procesando...';

    fetch("{{ route('pos.store') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ items: cart })
    })
    .then(res => res.json())
    .then(data => {
        closePayModal();
        cart = [];
        renderCart();
        showToast('success', data.message || 'Venta registrada exitosamente');
    })
    .catch(() => {
        showToast('error', 'Error al procesar la venta. Intenta de nuevo.');
        confirmBtn.disabled    = false;
        confirmBtn.textContent = 'Confirmar venta';
    });
}

function showToast(type, message) {
    const container = document.getElementById('toastContainer');
    const toast     = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.innerHTML = `<span class="toast-msg">${message}</span>`;
    container.appendChild(toast);
    setTimeout(() => {
        toast.classList.add('hide');
        toast.addEventListener('animationend', () => toast.remove());
    }, 3500);
}

function escapeHtml(str) {
    return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

function confirmExit() {
    if (cart.length > 0) {
        if (!confirm('Tienes artículos en el carrito. ¿Seguro que deseas salir?')) return;
    }
    window.location.href = '/';
}

document.addEventListener('DOMContentLoaded', function() {
    filterProducts();
    renderCart();
});
</script>

</body>
</html>