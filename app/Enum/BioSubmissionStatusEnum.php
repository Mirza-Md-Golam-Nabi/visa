<?php

namespace App\Enum;

enum BioSubmissionStatusEnum: string {
    case NO = 'no';
    case SUBMITTED = 'submitted';
    case RE_SUBMISSION = 're_submission';

    public function description(): string
    {
        return match ($this) {
            self::NO => 'No',
            self::SUBMITTED => 'Submitted',
            self::RE_SUBMISSION => 'Re Submission',
        };
    }
}
