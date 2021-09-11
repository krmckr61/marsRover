<?php

function getCoordinateValidationRules(): string {
    return 'required|numeric|gt:-1000|lt:1000';
}
