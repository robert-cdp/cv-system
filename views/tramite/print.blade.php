@extends('main')

@section('title', 'Imprimir Constancia de Tramite')

@section('content')

    <a href="{{ route('customer.show', $customer->dpi) }}" class="btn btn-secondary">
        <i class="fas fa-times me-1"></i> Cancelar
    </a>

    <button onclick="printSelectedServices()" class="btn btn-primary">
        Imprimir Comprobante
    </button>

    <style>
        :root {
            --primary-color: #1a3c72;
            --secondary-color: #4a90e2;
            --accent-color: #f0f4f8;
            --heading-color: #ffffff;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.4;
            background: #ffffff;
            color: #333;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            padding: 10px 15px;
        }

        /* Encabezado centrado */
        .header {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 8px;
            margin-bottom: 18px;
            padding: 15px 15px;
            background: linear-gradient(to right, var(--primary-color) 60%, var(--secondary-color));
            border-radius: 6px;
            color: var(--heading-color);
        }

        .header img {
            width: 100px;
            height: auto;
            filter: brightness(0) invert(1);
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
            letter-spacing: -0.5px;
        }

        .header p {
            margin: 2px 0;
            font-size: 12px;
            opacity: 0.9;
        }

        /* Tarjeta de información del cliente */
        .customer-card {
            background: #fff;
            border-radius: 6px;
            margin-bottom: 15px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .customer-card-header {
            background: var(--primary-color);
            color: var(--heading-color);
            padding: 10px 15px;
        }

        .customer-card-header h2 {
            margin: 0;
            font-size: 14px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .customer-card-body {
            padding: 15px;
        }

        /* Grid de información en dos columnas */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* Siempre 2 columnas */
            gap: 12px;
            /* Espacio entre columnas y filas */
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            padding: 8px;
            border: 1px solid #eee;
            /* Borde sutil */
            border-radius: 4px;
            background: #fafafa;
            /* Fondo suave */
        }

        .info-icon {
            flex-shrink: 0;
            width: 20px;
            height: 20px;
            margin-top: 2px;
        }

        .info-icon svg {
            width: 100%;
            height: 100%;
            fill: var(--secondary-color);
        }

        .info-details strong {
            display: block;
            font-size: 11px;
            color: var(--primary-color);
            margin-bottom: 2px;
        }

        .info-details span {
            font-size: 13px;
            font-weight: 500;
            word-break: break-all;
        }

        /* Sección de servicios */
        .services-section {
            margin: 15px 0;
        }

        .services-section h2 {
            color: var(--primary-color);
            margin: 0 0 10px 0;
            font-size: 14px;
            text-transform: uppercase;
        }

        .service-table {
            width: 100%;
            border-collapse: collapse;
            margin: 12px 0;
            font-size: 12px;
        }

        .service-table th {
            background: var(--primary-color);
            color: white;
            padding: 8px 10px;
            text-align: left;
        }

        .service-table td {
            padding: 8px 10px;
            border-bottom: 1px solid #eee;
        }

        /* Nota de seguridad */
        .security-note {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            font-size: 12px;
        }

        /* Pie de página */
        .footer {
            text-align: center;
            padding: 10px;
            margin-top: 15px;
            font-size: 10px;
            color: #666;
            border-top: 2px solid var(--accent-color);
        }

        .contact-info {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 8px 0;
            flex-wrap: wrap;
        }

        /* Para pantallas pequeñas (solo en pantalla, no en impresión) */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .header {
                padding: 10px;
            }

            .header img {
                width: 80px;
            }

            .header h1 {
                font-size: 18px;
            }

            .customer-card-body {
                padding: 10px;
            }

            /* Para móviles en pantalla, 1 sola columna.
                                             Sin embargo, al imprimir, se fuerzan 2 columnas (ver @media print). */
            .info-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Ajustes para impresión: forzar 2 columnas y ancho completo */
        @media print {
            body {
                margin: 0 !important;
                padding: 0 !important;
            }

            .container {
                width: 100% !important;
                max-width: 100% !important;
                box-shadow: none;
                padding: 10px !important;
            }

            /* Forzamos 2 columnas incluso si el ancho es menor */
            .info-grid {
                grid-template-columns: 1fr 1fr !important;
            }
        }
    </style>

    <div class="container">
        <!-- Encabezado -->
        <header class="header">
            <img src="{{ asset('img/encabezado.png') }}" alt="Logo">
            <h1>Conexión Virtual</h1>
            <p>2da Calle 4-02 Zona 1 Chicacao, Suchitepéquez</p>
            <p>Teléfono: 5443 0643</p>
            <p>info@conexionvirtual.net | www.conexionvirtual.net</p>
        </header>

        <!-- Tarjeta de Información del Cliente -->
        <article class="customer-card">
            <div class="customer-card-header">
                <h2>Información del Cliente</h2>
            </div>
            <div class="customer-card-body">
                <div class="info-grid">
                    <!-- Ítem 1: Cliente -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="info-details">
                            <strong>Cliente</strong>
                            <span>{{ $customer->full_name }}</span>
                        </div>
                    </div>

                    <!-- Ítem 2: DPI -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <div class="info-details">
                            <strong>DPI</strong>
                            <span>{{ $customer->dpi }}</span>
                        </div>
                    </div>

                    <!-- Ítem 3: NIT -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <div class="info-details">
                            <strong>NIT</strong>
                            <span>{{ $customer->nit }}</span>
                        </div>
                    </div>

                    <!-- Ítem 4: Fecha de nacimiento -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="info-details">
                            <strong>Fecha de Nacimiento</strong>
                            <span>{{ $customer->birthday->format('d-m-Y') }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </article>

        <!-- Detalle de Servicios -->
        <div class="services-section">
            <h2>Detalle de Servicios</h2>
            @foreach ($customer->services as $service)
                <div class="service-wrapper">
                    <label style="display: flex; align-items: center; gap: 6px; font-size: 12px; margin-bottom: 4px;">
                        <input type="checkbox" class="service-checkbox" checked>
                        {{ $service->service->name ?? 'Servicio Desconocido' }}
                    </label>
                    <table class="service-table">
                        <thead>
                            <tr>
                                <th colspan="2">{{ $service->service->name ?? 'Servicio Desconocido' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 50%">
                                    <strong>Usuario:</strong> {{ $service->tramite->email_decrypted }}
                                </td>
                                <td style="width: 50%">
                                    <strong>Contraseña:</strong> {{ $service->tramite->password_decrypted }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>

        <!-- Nota de seguridad -->
        <div class="security-note">
            <strong>⚠️ IMPORTANTE:</strong> Proteja sus credenciales. Este Documento es personal y no debe ser perdido o
            divulgado.
        </div>

        <!-- Pie de página -->
        <footer class="footer">
            <div class="contact-info">
                <div>📞 5443 0643</div>
                <div>✉️ info@conexionvirtual.net</div>
                <div>🌐 www.conexionvirtual.net</div>
            </div>
            <p style="margin: 8px 0;">Horario: L-V 8:00 - 19:00 hrs</p>
            <p style="margin: 0;">Documento válido como comprobante oficial</p>
        </footer>
    </div>

    <script>
        function printSelectedServices() {
            // Seleccionamos el contenedor completo
            const container = document.querySelector('.container');

            // Clonamos el contenedor (no tocamos la vista original)
            const clone = container.cloneNode(true);

            // Recorremos todos los wrappers de servicios
            clone.querySelectorAll('.service-wrapper').forEach(wrapper => {
                const checkbox = wrapper.querySelector('.service-checkbox');
                if (!checkbox.checked) {
                    // Si el servicio no está seleccionado, lo eliminamos del clon
                    wrapper.remove();
                } else {
                    // Si está seleccionado, quitamos el checkbox del clon para que no aparezca impreso
                    const cb = wrapper.querySelector('.service-checkbox');
                    if (cb) cb.remove();
                }
            });

            // Abrimos una nueva ventana para imprimir solo el clon
            const printWindow = window.open('', '', 'height=800,width=1000');
            printWindow.document.write('<html><head><title>Comprobante</title>');

            // Copiamos todos los estilos
            Array.from(document.querySelectorAll('style, link[rel="stylesheet"]')).forEach(style => {
                printWindow.document.write(style.outerHTML);
            });

            printWindow.document.write('</head><body>');
            printWindow.document.write(clone.outerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }
    </script>
@endsection
