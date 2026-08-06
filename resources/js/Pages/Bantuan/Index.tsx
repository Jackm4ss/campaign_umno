import { Head, useForm } from '@inertiajs/react';
import { FormEvent } from 'react';
import PublicLayout from '../../Layouts/PublicLayout';

export default function BantuanIndex() {
    const { data, setData, post, processing, errors, reset } = useForm({
        full_name: '',
        identity_number: '',
        identity_type: 'MyKad',
        birth_date: '',
        phone: '',
        email: '',
        email_confirmation: '',
        address: '',
        presint: '',
        aid_types: [] as string[],
        patient_name: '',
        patient_identity_number: '',
        patient_phone: '',
        patient_address: '',
    });

    const needsPatient = data.aid_types.includes('katil_hospital_kerusi_roda');

    const toggleAidType = (type: string) => {
        const current = data.aid_types;
        setData('aid_types', current.includes(type) ? current.filter((t) => t !== type) : [...current, type]);
    };

    const handleSubmit = (e: FormEvent) => {
        e.preventDefault();
        post('/daftar', { onSuccess: () => reset() });
    };

    const aidOptions = [
        { value: 'keperluan_asas_dapur', label: 'Keperluan Asas Dapur' },
        { value: 'wang_tunai', label: 'Bantuan Wang Tunai' },
        { value: 'katil_hospital_kerusi_roda', label: 'Katil Hospital / Kerusi Roda' },
        { value: 'van_jenazah_percuma', label: 'Van Jenazah Percuma' },
        { value: 'kad_kesihatan_kunan', label: 'Kad Kesihatan KuNan' },
    ];

    return (
        <PublicLayout>
            <Head title="Borang Bantuan" />
            <section className="pt-24 pb-16 bg-white">
                <div className="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
                    <div className="text-center mb-12">
                        <p className="text-[#CC1A1A] text-xs font-bold uppercase tracking-[4px] mb-4">Kebajikan</p>
                        <h1 className="font-['Bebas_Neue'] text-4xl md:text-5xl text-[#1A1A2E] mb-4">BORANG BANTUAN</h1>
                        <p className="text-gray-600">
                            Permohonan anda akan diproses dalam tempoh lima (5) hari bekerja.
                            Admin akan berhubung melalui E-Mel atau Whatsapp jika diluluskan.
                        </p>
                    </div>

                    <form onSubmit={handleSubmit} className="space-y-6">
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label className="block text-sm font-medium text-gray-700 mb-1">Nama Penuh</label>
                                <input type="text" value={data.full_name} onChange={(e) => setData('full_name', e.target.value)} className="w-full px-4 py-3 border border-gray-200 rounded focus:outline-none focus:border-[#CC1A1A]" />
                                {errors.full_name ? <p className="text-red-500 text-xs mt-1">{errors.full_name}</p> : null}
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-gray-700 mb-1">No. Kad Pengenalan</label>
                                <input type="text" value={data.identity_number} onChange={(e) => setData('identity_number', e.target.value)} className="w-full px-4 py-3 border border-gray-200 rounded focus:outline-none focus:border-[#CC1A1A]" />
                                {errors.identity_number ? <p className="text-red-500 text-xs mt-1">{errors.identity_number}</p> : null}
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-gray-700 mb-1">Jenis Dokumen</label>
                                <select value={data.identity_type} onChange={(e) => setData('identity_type', e.target.value)} className="w-full px-4 py-3 border border-gray-200 rounded focus:outline-none focus:border-[#CC1A1A]">
                                    <option value="MyKad">MyKad</option>
                                    <option value="MyTentera">MyTentera</option>
                                    <option value="MyPolis">MyPolis</option>
                                </select>
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-gray-700 mb-1">Tarikh Lahir</label>
                                <input type="date" value={data.birth_date} onChange={(e) => setData('birth_date', e.target.value)} className="w-full px-4 py-3 border border-gray-200 rounded focus:outline-none focus:border-[#CC1A1A]" />
                                {errors.birth_date ? <p className="text-red-500 text-xs mt-1">{errors.birth_date}</p> : null}
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-gray-700 mb-1">Telefon</label>
                                <input type="tel" value={data.phone} onChange={(e) => setData('phone', e.target.value)} className="w-full px-4 py-3 border border-gray-200 rounded focus:outline-none focus:border-[#CC1A1A]" />
                                {errors.phone ? <p className="text-red-500 text-xs mt-1">{errors.phone}</p> : null}
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-gray-700 mb-1">Presint</label>
                                <input type="text" value={data.presint} onChange={(e) => setData('presint', e.target.value)} className="w-full px-4 py-3 border border-gray-200 rounded focus:outline-none focus:border-[#CC1A1A]" />
                                {errors.presint ? <p className="text-red-500 text-xs mt-1">{errors.presint}</p> : null}
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-gray-700 mb-1">E-mel</label>
                                <input type="email" value={data.email} onChange={(e) => setData('email', e.target.value)} className="w-full px-4 py-3 border border-gray-200 rounded focus:outline-none focus:border-[#CC1A1A]" />
                                {errors.email ? <p className="text-red-500 text-xs mt-1">{errors.email}</p> : null}
                            </div>
                            <div>
                                <label className="block text-sm font-medium text-gray-700 mb-1">Sahkan E-mel</label>
                                <input type="email" value={data.email_confirmation} onChange={(e) => setData('email_confirmation', e.target.value)} className="w-full px-4 py-3 border border-gray-200 rounded focus:outline-none focus:border-[#CC1A1A]" />
                            </div>
                        </div>

                        <div>
                            <label className="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                            <textarea value={data.address} onChange={(e) => setData('address', e.target.value)} rows={3} className="w-full px-4 py-3 border border-gray-200 rounded focus:outline-none focus:border-[#CC1A1A] resize-none" />
                            {errors.address ? <p className="text-red-500 text-xs mt-1">{errors.address}</p> : null}
                        </div>

                        <div>
                            <label className="block text-sm font-medium text-gray-700 mb-3">Jenis Bantuan</label>
                            <div className="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                {aidOptions.map((opt) => (
                                    <label key={opt.value} className={`flex items-center gap-3 p-4 border rounded cursor-pointer transition-colors ${data.aid_types.includes(opt.value) ? 'border-[#CC1A1A] bg-red-50' : 'border-gray-200 hover:border-gray-300'}`}>
                                        <input type="checkbox" checked={data.aid_types.includes(opt.value)} onChange={() => toggleAidType(opt.value)} className="accent-[#CC1A1A]" />
                                        <span className="text-sm">{opt.label}</span>
                                    </label>
                                ))}
                            </div>
                        </div>

                        {needsPatient ? (
                            <div className="border border-amber-200 bg-amber-50 rounded-xl p-6 space-y-4">
                                <p className="text-sm font-bold text-amber-800">Maklumat Pesakit (Katil Hospital / Kerusi Roda)</p>
                                <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <input type="text" placeholder="Nama pesakit" value={data.patient_name} onChange={(e) => setData('patient_name', e.target.value)} className="w-full px-4 py-3 border border-gray-200 rounded focus:outline-none focus:border-[#CC1A1A]" />
                                        {errors.patient_name ? <p className="text-red-500 text-xs mt-1">{errors.patient_name}</p> : null}
                                    </div>
                                    <div>
                                        <input type="text" placeholder="No. KP pesakit" value={data.patient_identity_number} onChange={(e) => setData('patient_identity_number', e.target.value)} className="w-full px-4 py-3 border border-gray-200 rounded focus:outline-none focus:border-[#CC1A1A]" />
                                        {errors.patient_identity_number ? <p className="text-red-500 text-xs mt-1">{errors.patient_identity_number}</p> : null}
                                    </div>
                                    <div>
                                        <input type="tel" placeholder="No. telefon pesakit" value={data.patient_phone} onChange={(e) => setData('patient_phone', e.target.value)} className="w-full px-4 py-3 border border-gray-200 rounded focus:outline-none focus:border-[#CC1A1A]" />
                                        {errors.patient_phone ? <p className="text-red-500 text-xs mt-1">{errors.patient_phone}</p> : null}
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Alamat pesakit" value={data.patient_address} onChange={(e) => setData('patient_address', e.target.value)} className="w-full px-4 py-3 border border-gray-200 rounded focus:outline-none focus:border-[#CC1A1A]" />
                                        {errors.patient_address ? <p className="text-red-500 text-xs mt-1">{errors.patient_address}</p> : null}
                                    </div>
                                </div>
                            </div>
                        ) : null}

                        <div className="text-center">
                            <button type="submit" disabled={processing} className="inline-flex items-center gap-2 px-10 py-4 bg-[#CC1A1A] text-white text-xs font-bold uppercase tracking-widest rounded hover:bg-[#9E1212] transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                {processing ? 'Menghantar...' : 'Hantar Permohonan'}
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </PublicLayout>
    );
}
