import { useEffect, useId, useRef } from 'react';

export type LegalDocument = 'terms' | 'privacy';

interface Props {
    document: LegalDocument | null;
    onClose: () => void;
}

const UPDATED_AT = '13 Ogos 2026';

function TermsContent() {
    return (
        <>
            <p>Selamat datang ke platform Tak Banyak Alasan. Dengan mengakses laman web ini dan/atau mengemukakan permohonan bantuan melalui platform ini, anda dianggap telah membaca, memahami dan bersetuju untuk terikat dengan Terma &amp; Syarat berikut.</p>

            <section>
                <h3>1. Kelayakan Pemohon</h3>
                <ol>
                    <li>Pemohon mestilah warganegara Malaysia.</li>
                    <li>Pemohon mestilah berumur 18 tahun dan ke atas pada tarikh permohonan.</li>
                    <li>Pemohon mestilah merupakan pengundi berdaftar di Wilayah Persekutuan Putrajaya.</li>
                    <li>Pemohon hendaklah memberikan maklumat peribadi, maklumat permohonan dan dokumen sokongan yang benar, tepat, lengkap dan terkini.</li>
                </ol>
            </section>

            <section>
                <h3>2. Had dan Kekerapan Penerimaan Bantuan</h3>
                <ol>
                    <li>Pemohon hanya layak menerima satu (1) kali bantuan bagi setiap kategori bantuan dalam tempoh satu (1) tahun, tertakluk kepada syarat dan kelulusan yang ditetapkan.</li>
                    <li>Bantuan van jenazah adalah dikecualikan daripada had tersebut dan tertakluk kepada keperluan serta syarat khusus yang ditetapkan.</li>
                    <li>Pemohon yang telah menerima sesuatu kategori bantuan pada tahun semasa masih boleh memohon kategori bantuan lain dalam tahun yang sama, tertakluk kepada kelayakan.</li>
                    <li>Pemohon boleh memohon semula kategori bantuan yang sama pada tahun berikutnya, tertakluk kepada syarat dan kelayakan semasa.</li>
                    <li>Kelulusan atau penerimaan bantuan pada masa lalu tidak menjamin kelulusan permohonan pada masa hadapan.</li>
                </ol>
            </section>

            <section>
                <h3>3. Pengemukaan Permohonan</h3>
                <ol>
                    <li>Semua permohonan hendaklah dibuat melalui saluran rasmi yang ditetapkan oleh Tak Banyak Alasan.</li>
                    <li>Hanya permohonan yang lengkap dan disahkan benar akan dipertimbangkan untuk diproses.</li>
                    <li>Pihak pengurusan berhak meminta dokumen atau maklumat tambahan bagi tujuan pengesahan.</li>
                    <li>Permohonan yang tidak lengkap, tidak jelas atau gagal memberikan maklumat yang diperlukan boleh ditangguhkan, dikembalikan atau ditolak.</li>
                </ol>
            </section>

            <section>
                <h3>4. Kebenaran untuk Membuat Pengesahan</h3>
                <ol>
                    <li>Dengan mengemukakan permohonan, pemohon memberikan kebenaran kepada pihak pengurusan untuk membuat semakan dan pengesahan terhadap maklumat yang diberikan bagi tujuan menilai kelayakan permohonan.</li>
                    <li>Pengesahan boleh dibuat melalui dokumen sokongan, maklumat yang diberikan oleh pemohon atau sumber lain yang dibenarkan oleh undang-undang.</li>
                </ol>
            </section>

            <section>
                <h3>5. Ketepatan Maklumat dan Dokumen</h3>
                <ol>
                    <li>Pemohon bertanggungjawab sepenuhnya memastikan semua maklumat dan dokumen yang dikemukakan adalah benar, sah dan tidak mengelirukan.</li>
                    <li>Penggunaan maklumat palsu, dokumen palsu, dokumen milik orang lain atau sebarang percubaan untuk memanipulasi proses permohonan boleh menyebabkan permohonan ditolak atau kelulusan dibatalkan.</li>
                    <li>Pihak pengurusan berhak mengambil tindakan sewajarnya sekiranya terdapat unsur penipuan atau penyalahgunaan proses permohonan.</li>
                </ol>
            </section>

            <section>
                <h3>6. Permohonan Berganda</h3>
                <ol>
                    <li>Pemohon tidak dibenarkan mengemukakan permohonan berganda bagi kategori bantuan yang sama dalam tempoh kelayakan yang sama dengan tujuan mendapatkan bantuan melebihi had yang ditetapkan.</li>
                    <li>Sekiranya terdapat lebih daripada satu permohonan bagi pemohon yang sama, pihak pengurusan berhak menggabungkan, menangguhkan atau membatalkan permohonan tersebut.</li>
                </ol>
            </section>

            <section>
                <h3>7. Kelulusan Bantuan</h3>
                <ol>
                    <li>Pengemukaan permohonan tidak bermaksud bantuan telah diluluskan.</li>
                    <li>Setiap permohonan tertakluk kepada proses semakan, pengesahan, syarat kelayakan, jenis bantuan dan ketersediaan sumber atau peruntukan.</li>
                    <li>Pihak pengurusan berhak meluluskan, menolak, menangguhkan atau meminta maklumat tambahan berhubung sesuatu permohonan.</li>
                    <li>Sebarang keputusan kelulusan hendaklah berdasarkan syarat dan garis panduan bantuan yang berkuat kuasa pada masa permohonan diproses.</li>
                </ol>
            </section>

            <section>
                <h3>8. Tanggungjawab Pemohon</h3>
                <ol>
                    <li>Pemohon hendaklah memberikan kerjasama sepanjang proses semakan dan pengesahan.</li>
                    <li>Pemohon hendaklah memaklumkan kepada pihak pengurusan sekiranya terdapat perubahan terhadap maklumat penting yang diberikan.</li>
                    <li>Bantuan yang diterima hendaklah digunakan bagi tujuan yang dinyatakan dalam permohonan dan/atau tujuan yang telah diluluskan.</li>
                </ol>
            </section>

            <section>
                <h3>9. Penolakan atau Pembatalan Permohonan</h3>
                <p>Pihak pengurusan berhak menolak atau membatalkan sesuatu permohonan sekiranya:</p>
                <ul>
                    <li>Pemohon tidak memenuhi syarat kelayakan;</li>
                    <li>Maklumat yang diberikan tidak benar, tidak lengkap atau mengelirukan;</li>
                    <li>Dokumen sokongan tidak sah atau tidak mencukupi;</li>
                    <li>Pemohon telah menerima bantuan bagi kategori yang sama dalam tempoh yang ditetapkan;</li>
                    <li>Terdapat permohonan berganda yang melanggar syarat;</li>
                    <li>Pemohon gagal memberikan maklumat atau dokumen tambahan yang diperlukan; atau</li>
                    <li>Terdapat sebab lain yang munasabah berdasarkan dasar dan garis panduan bantuan yang berkuat kuasa.</li>
                </ul>
            </section>

            <section>
                <h3>10. Pindaan Terma &amp; Syarat</h3>
                <ol>
                    <li>Pihak pengurusan berhak meminda, menambah atau mengemas kini Terma &amp; Syarat ini dari semasa ke semasa.</li>
                    <li>Sebarang pindaan akan berkuat kuasa selepas diterbitkan melalui laman web atau saluran rasmi Tak Banyak Alasan, melainkan dinyatakan sebaliknya.</li>
                </ol>
            </section>

            <section>
                <h3>11. Pengakuan Pemohon</h3>
                <p>Dengan menekan butang “Hantar Permohonan”, pemohon mengesahkan bahawa:</p>
                <ul>
                    <li>Saya telah membaca dan memahami Terma &amp; Syarat Permohonan Bantuan ini.</li>
                    <li>Saya mengesahkan bahawa semua maklumat dan dokumen yang diberikan adalah benar, tepat dan lengkap.</li>
                    <li>Saya bersetuju pihak pengurusan membuat semakan dan pengesahan terhadap maklumat yang diberikan.</li>
                    <li>Saya memahami bahawa pengemukaan permohonan tidak menjamin kelulusan bantuan.</li>
                    <li>Saya bersetuju dengan pemprosesan maklumat saya sebagaimana diterangkan dalam Dasar Privasi Tak Banyak Alasan.</li>
                </ul>
            </section>
        </>
    );
}

function PrivacyContent() {
    return (
        <>
            <p>Tak Banyak Alasan menghormati privasi setiap pemohon dan komited untuk mengendalikan maklumat peribadi dengan bertanggungjawab. Dasar Privasi ini menerangkan bagaimana maklumat pemohon dikumpulkan, digunakan, disimpan dan dilindungi apabila menggunakan laman web dan perkhidmatan permohonan bantuan kami.</p>

            <section>
                <h3>1. Maklumat yang Dikumpulkan</h3>
                <p>Bergantung kepada jenis permohonan, kami mungkin mengumpul maklumat seperti:</p>
                <ul>
                    <li>Nama penuh;</li>
                    <li>Nombor kad pengenalan;</li>
                    <li>Tarikh lahir atau umur;</li>
                    <li>Alamat dan maklumat tempat tinggal;</li>
                    <li>Nombor telefon;</li>
                    <li>Alamat e-mel;</li>
                    <li>Maklumat status pengundi yang berkaitan dengan kelayakan permohonan;</li>
                    <li>Maklumat berkaitan keperluan bantuan;</li>
                    <li>Maklumat keluarga atau tanggungan yang diperlukan untuk menilai permohonan;</li>
                    <li>Maklumat akaun pembayaran, jika diperlukan bagi kategori bantuan tertentu; dan</li>
                    <li>Dokumen sokongan yang dikemukakan oleh pemohon.</li>
                </ul>
            </section>

            <section>
                <h3>2. Tujuan Pengumpulan Maklumat</h3>
                <p>Maklumat yang dikumpulkan boleh digunakan untuk:</p>
                <ol>
                    <li>Memproses dan menilai permohonan bantuan;</li>
                    <li>Mengesahkan identiti dan kelayakan pemohon;</li>
                    <li>Menjalankan semakan terhadap maklumat dan dokumen yang dikemukakan;</li>
                    <li>Mengelakkan permohonan berganda, penyalahgunaan atau penipuan;</li>
                    <li>Mengurus penyaluran bantuan yang diluluskan;</li>
                    <li>Menyimpan rekod permohonan dan penerimaan bantuan;</li>
                    <li>Menghubungi pemohon berkaitan status atau keperluan permohonan; dan</li>
                    <li>Memenuhi keperluan undang-undang, peraturan atau arahan pihak berkuasa yang berkaitan.</li>
                </ol>
            </section>

            <section>
                <h3>3. Ketepatan Maklumat</h3>
                <p>Pemohon bertanggungjawab memastikan maklumat yang diberikan adalah benar, tepat, lengkap dan terkini.</p>
                <p>Sekiranya terdapat perubahan terhadap maklumat penting, pemohon hendaklah memaklumkan kepada pihak pengurusan supaya rekod dapat dikemas kini.</p>
            </section>

            <section>
                <h3>4. Perkongsian Maklumat</h3>
                <p>Maklumat peribadi pemohon tidak akan dijual atau diperdagangkan.</p>
                <p>Walau bagaimanapun, maklumat tertentu boleh dikongsi atau didedahkan apabila diperlukan bagi tujuan pemprosesan dan pengesahan permohonan, termasuk kepada pihak yang membantu menguruskan permohonan atau penyaluran bantuan, atau apabila diperlukan atau dibenarkan oleh undang-undang.</p>
            </section>

            <section>
                <h3>5. Keselamatan Maklumat</h3>
                <p>Kami mengambil langkah yang munasabah untuk melindungi maklumat peribadi daripada kehilangan, penyalahgunaan, akses tanpa kebenaran, perubahan atau pendedahan yang tidak dibenarkan.</p>
                <p>Walau bagaimanapun, tiada sistem penghantaran atau penyimpanan data melalui internet yang boleh dijamin sepenuhnya selamat.</p>
            </section>

            <section>
                <h3>6. Tempoh Penyimpanan</h3>
                <p>Maklumat peribadi akan disimpan selama tempoh yang munasabah dan diperlukan bagi tujuan pengurusan permohonan, rekod bantuan, audit, pematuhan undang-undang atau tujuan sah yang berkaitan.</p>
                <p>Apabila maklumat tersebut tidak lagi diperlukan, ia akan dipadamkan, dilupuskan atau dianonimkan mengikut prosedur yang bersesuaian.</p>
            </section>

            <section>
                <h3>7. Pautan ke Laman Web Pihak Ketiga</h3>
                <p>Laman web kami mungkin mengandungi pautan kepada laman web atau perkhidmatan pihak ketiga.</p>
                <p>Kami tidak bertanggungjawab terhadap amalan privasi, kandungan atau keselamatan laman web pihak ketiga tersebut. Pemohon dinasihatkan membaca dasar privasi laman web berkenaan sebelum memberikan sebarang maklumat.</p>
            </section>

            <section>
                <h3>8. Penggunaan Kuki (Cookies)</h3>
                <p>Laman web ini mungkin menggunakan cookies atau teknologi yang serupa untuk membantu memastikan fungsi laman web berjalan dengan baik, meningkatkan pengalaman pengguna dan memahami penggunaan laman web.</p>
                <p>Pemohon boleh mengubah tetapan cookies melalui pelayar internet masing-masing, tertakluk kepada fungsi yang tersedia.</p>
            </section>

            <section>
                <h3>9. Hak Pemohon</h3>
                <p>Tertakluk kepada undang-undang dan keadaan yang berkaitan, pemohon boleh menghubungi pihak pengurusan untuk mendapatkan maklumat berkenaan pemprosesan data peribadi mereka atau meminta pembetulan terhadap maklumat yang tidak tepat.</p>
                <p>Sesetengah permintaan mungkin tertakluk kepada keperluan pengesahan identiti dan sekatan undang-undang atau operasi.</p>
            </section>

            <section>
                <h3>10. Perubahan Dasar Privasi</h3>
                <p>Kami berhak mengemas kini Dasar Privasi ini dari semasa ke semasa bagi mencerminkan perubahan dalam operasi, teknologi, keperluan undang-undang atau amalan pengurusan data.</p>
                <p>Versi terkini akan diterbitkan di laman web rasmi Tak Banyak Alasan bersama tarikh kemas kini.</p>
            </section>

            <section>
                <h3>11. Hubungi Kami</h3>
                <p>Sekiranya anda mempunyai sebarang pertanyaan berkaitan Dasar Privasi atau pengendalian maklumat peribadi anda, sila hubungi:</p>
                <address>
                    <strong>Tak Banyak Alasan</strong><br />
                    E-mel: <a href="mailto:info@takbanyakalasan.com">info@takbanyakalasan.com</a>
                </address>
            </section>
        </>
    );
}

export default function LegalModal({ document, onClose }: Props) {
    const titleId = useId();
    const closeButtonRef = useRef<HTMLButtonElement>(null);

    useEffect(() => {
        if (!document) return;

        const previousOverflow = documentBodyOverflow();
        const previouslyFocused = window.document.activeElement as HTMLElement | null;
        window.document.body.style.overflow = 'hidden';
        closeButtonRef.current?.focus();

        const handleKeyDown = (event: KeyboardEvent) => {
            if (event.key === 'Escape') onClose();
        };

        window.document.addEventListener('keydown', handleKeyDown);

        return () => {
            window.document.body.style.overflow = previousOverflow;
            window.document.removeEventListener('keydown', handleKeyDown);
            previouslyFocused?.focus();
        };
    }, [document, onClose]);

    if (!document) return null;

    const isTerms = document === 'terms';
    const title = isTerms ? 'Terma & Syarat Permohonan Bantuan' : 'Dasar Privasi';

    return (
        <div className="legal-modal-backdrop" onMouseDown={(event) => { if (event.target === event.currentTarget) onClose(); }}>
            <section className="legal-modal" role="dialog" aria-modal="true" aria-labelledby={titleId}>
                <header className="legal-modal-header">
                    <div>
                        <span className="legal-modal-eyebrow">Tak Banyak Alasan</span>
                        <h2 id={titleId}>{title}</h2>
                        <p>Dikemas kini: {UPDATED_AT}</p>
                    </div>
                    <button ref={closeButtonRef} type="button" className="legal-modal-close" onClick={onClose} aria-label={`Tutup ${title}`}>
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12" /></svg>
                    </button>
                </header>
                <div className="legal-modal-content">
                    {isTerms ? <TermsContent /> : <PrivacyContent />}
                </div>
                <footer className="legal-modal-footer">
                    <button type="button" className="btn btn-red" onClick={onClose}>Saya Faham</button>
                </footer>
            </section>
        </div>
    );
}

function documentBodyOverflow(): string {
    return window.document.body.style.overflow;
}
