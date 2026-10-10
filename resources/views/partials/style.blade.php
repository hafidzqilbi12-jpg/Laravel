
/* ===== DASAR HALAMAN ===== */
* {
    box-sizing: border-box;
}

html {
    background: #f1f5f9;
}

body {
    font-family: "Segoe UI", Arial, sans-serif;
    max-width: 1150px;
    margin: 35px auto;
    padding: 32px;
    background: #ffffff;
    color: #1e293b;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    box-shadow: 0 8px 30px rgba(15, 23, 42, 0.06);
    line-height: 1.6;
}

/* ===== JUDUL ===== */
h1 {
    margin: 0 0 22px;
    color: #0f172a;
    font-size: 28px;
    font-weight: 700;
    letter-spacing: -0.5px;
}

h2, h3 {
    color: #1e293b;
}

/* ===== NAVIGASI ===== */
body > p a {
    color: #2563eb;
    font-weight: 500;
    text-decoration: none;
}

body > p a:hover {
    color: #1d4ed8;
    text-decoration: underline;
}

/* ===== TABEL ===== */
table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin-top: 24px;
    overflow: hidden;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    font-size: 14px;
}

th,
td {
    padding: 13px 14px;
    text-align: left;
    border-bottom: 1px solid #e2e8f0;
}

th {
    background: #f8fafc;
    color: #334155;
    font-weight: 650;
    white-space: nowrap;
}

td {
    color: #475569;
}

tbody tr:last-child td {
    border-bottom: none;
}

tbody tr:hover {
    background: #f8fafc;
}

/* ===== LINK DAN TOMBOL ===== */
a {
    transition: color 0.2s ease, background 0.2s ease;
}

button,
.btn {
    display: inline-block;
    padding: 9px 15px;
    border: 1px solid #cbd5e1;
    border-radius: 7px;
    background: #ffffff;
    color: #334155;
    font-family: inherit;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    cursor: pointer;
    transition: 0.2s ease;
}

button:hover,
.btn:hover {
    background: #f1f5f9;
    border-color: #94a3b8;
}

a.btn {
    color: #334155;
}

/* ===== FORM DAN INPUT ===== */
form {
    display: inline;
}

label {
    display: inline-block;
    margin: 12px 0 6px;
    color: #334155;
    font-size: 14px;
    font-weight: 600;
}

input,
select,
textarea {
    width: 100%;
    box-sizing: border-box;
    padding: 11px 12px;
    border: 1px solid #cbd5e1;
    border-radius: 7px;
    background: #ffffff;
    color: #1e293b;
    font-family: inherit;
    font-size: 14px;
    outline: none;
}

input:focus,
select:focus,
textarea:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12);
}

input[type="checkbox"] {
    width: auto;
    margin-right: 6px;
}

/* ===== PESAN ===== */
.success {
    padding: 12px 16px;
    border: 1px solid #bbf7d0;
    border-radius: 8px;
    background: #f0fdf4;
    color: #166534;
}

.errors {
    padding: 12px 16px 12px 35px;
    border: 1px solid #fecaca;
    border-radius: 8px;
    background: #fef2f2;
    color: #b91c1c;
}

/* ===== PAGINATION ===== */
.pagination {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 7px;
    margin-top: 24px;
}

.pagination a,
.pagination span {
    display: inline-block;
    padding: 7px 12px;
    border: 1px solid #e2e8f0;
    border-radius: 7px;
    background: #ffffff;
    color: #334155;
    text-decoration: none;
    font-size: 14px;
}

.pagination a:hover {
    background: #eff6ff;
    border-color: #93c5fd;
    color: #1d4ed8;
}

.pagination .active {
    border-color: #2563eb;
    background: #2563eb;
    color: #ffffff;
    font-weight: 700;
}

/* ===== TAMPILAN LAPTOP KECIL DAN HP ===== */
@media (max-width: 768px) {
    body {
        margin: 12px;
        padding: 18px;
        border-radius: 10px;
    }

    h1 {
        font-size: 23px;
    }

    table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }

    button,
    .btn {
        padding: 8px 11px;
    }
}
