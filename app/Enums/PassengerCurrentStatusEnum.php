<?php

namespace App\Enums;

enum PassengerCurrentStatusEnum: string {
    case NEW_FILE = 'new_file';
    case WAITING_FOR_MEDICAL = 'waiting_for_medical';
    case SEND_FOR_MEDICAL = 'send_for_medical';
    case WAITING_FOR_MEDICAL_REPORT = 'waiting_for_medical_report';
    case MEDICAL_PROBLEM = 'medical_problem';
    case WAITING_FOR_FLIGHT = 'waiting_for_flight';
    case WAITING_FOR_MOFA = 'waiting_for_mofa';
    case SEND_FOR_MOFA = 'send_for_mofa';
    case WAITING_FOR_CARD = 'waiting_for_card';
    case EMBASSY = 'embassy';
    case WAITING_FOR_FINGER = 'waiting_for_finger';
    case SEND_FOR_FINGER = 'send_for_finger';
    case WAITING_FOR_CERTIFICATE = 'waiting_for_certificate';
    case WAITING_FOR_MANPOWER = 'waiting_for_manpower';
    case SEND_FOR_MANPOWER = 'send_for_manpower';
    case VISA_CANCELLED = 'visa_cancelled';
    case FILE_CANCELLED = 'file_cancelled';
    case UNFIT = 'unfit';
    case WAITING_FOR_ACCOUNT = 'waiting_for_account';
    case COMPLETED = 'completed';
    case WAITING_FOR_VISA = 'waiting_for_visa';
    case WAITING_FOR_WOKALA = 'waiting_for_wokala';
    case WAITING_FOR_TICKET = 'waiting_for_ticket';
    case BACK_FROM_SAUDI_ARABIA = 'back_from_saudi_arabia';
    case FIT = 'fit';
    case FIT_AND_CARD_OK = 'fit_and_card_ok';
    case VISIT = 'visit';
    case WAITING_FOR_MEDICAL_VISA = 'waiting_for_medical_visa';
    case PROCESSING = 'processing';

    public function description(): string
    {
        return match ($this) {
            self::NEW_FILE => 'New File',
            self::WAITING_FOR_MEDICAL => 'Waiting For Medical',
            self::SEND_FOR_MEDICAL => 'Send For Medical',
            self::WAITING_FOR_MEDICAL_REPORT => 'Waiting For Medical Report',
            self::MEDICAL_PROBLEM => 'Medical Problem',
            self::WAITING_FOR_FLIGHT => 'Waiting For Flight',
            self::WAITING_FOR_MOFA => 'Waiting For Mofa',
            self::SEND_FOR_MOFA => 'Send For Mofa',
            self::WAITING_FOR_CARD => 'Waiting For Card',
            self::EMBASSY => 'Embassy',
            self::WAITING_FOR_FINGER => 'Waiting For Finger',
            self::SEND_FOR_FINGER => 'Send For Finger',
            self::WAITING_FOR_CERTIFICATE => 'Waiting For Certificate',
            self::WAITING_FOR_MANPOWER => 'Waiting For Manpower',
            self::SEND_FOR_MANPOWER => 'Send For Manpower',
            self::VISA_CANCELLED => 'Visa Cancelled',
            self::FILE_CANCELLED => 'File Cancelled',
            self::UNFIT => 'Unfit',
            self::WAITING_FOR_ACCOUNT => 'Waiting For Account',
            self::COMPLETED => 'Completed',
            self::WAITING_FOR_VISA => 'Waiting For Visa',
            self::WAITING_FOR_WOKALA => 'Waiting For Wokala',
            self::WAITING_FOR_TICKET => 'Waiting For Ticket',
            self::BACK_FROM_SAUDI_ARABIA => 'Back From Saudi Arabia',
            self::FIT => 'Fit',
            self::FIT_AND_CARD_OK => 'Fit And Card Ok',
            self::VISIT => 'Visit',
            self::WAITING_FOR_MEDICAL_VISA => 'Waiting For Medical Visa',
            self::PROCESSING => 'Processing',
        };
    }
}
