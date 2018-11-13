<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Alumni
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Company[] $company
 * @property-read \App\Course $course
 * @property-read \App\District $district
 * @property-read \App\Province $province
 * @property-read \App\User $user
 */
	class Alumni extends \Eloquent {}
}

namespace App{
/**
 * App\Company
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Alumni[] $alumni
 */
	class Company extends \Eloquent {}
}

namespace App{
/**
 * App\Course
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Alumni[] $alumni
 */
	class Course extends \Eloquent {}
}

namespace App{
/**
 * App\District
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Alumni[] $alumni
 */
	class District extends \Eloquent {}
}

namespace App{
/**
 * App\Province
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Alumni[] $alumni
 */
	class Province extends \Eloquent {}
}

namespace App{
/**
 * App\Survey
 *
 */
	class Survey extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \App\Alumni $alumni
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 */
	class User extends \Eloquent {}
}

