import { useState } from 'react';
import LegalModal, { type LegalDocument } from './LegalModal';

interface Props {
    idPrefix: string;
}

export default function LegalConsentFields({ idPrefix }: Props) {
    const [openDocument, setOpenDocument] = useState<LegalDocument | null>(null);
    const termsId = `${idPrefix}-terms-accepted`;
    const privacyId = `${idPrefix}-privacy-accepted`;

    return (
        <>
            <div className="legal-consent-fields">
                <div className="legal-consent-row">
                    <input type="checkbox" id={termsId} name="terms_accepted" value="1" required />
                    <div className="legal-consent-copy">
                        <label htmlFor={termsId}>Saya telah membaca dan bersetuju dengan</label>{' '}
                        <button type="button" className="legal-inline-link" onClick={() => setOpenDocument('terms')}>Terma &amp; Syarat Permohonan Bantuan</button>.
                    </div>
                </div>
                <div className="legal-consent-row">
                    <input type="checkbox" id={privacyId} name="privacy_accepted" value="1" required />
                    <div className="legal-consent-copy">
                        <label htmlFor={privacyId}>Saya bersetuju dengan pemprosesan maklumat peribadi saya sebagaimana diterangkan dalam</label>{' '}
                        <button type="button" className="legal-inline-link" onClick={() => setOpenDocument('privacy')}>Dasar Privasi</button>.
                    </div>
                </div>
            </div>

            <LegalModal document={openDocument} onClose={() => setOpenDocument(null)} />
        </>
    );
}
