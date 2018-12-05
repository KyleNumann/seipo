Comment out line 910 - 919 from
forums/applications/dashboard/controllers/
open class.profilecontroller.php

to disable user's ability to edit profile (used for SSO continuity)

// Following Profile Edit Has been disabled
			
	if ($this->User->Photo != '' && $AllowImages)
	   $SideMenu->AddLink('Options', T('Remove Picture'), '/profile/removepicture/'.$this->User->UserID.'/'.Gdn_Format::Url($this->User->Name).'/'.$Session->TransientKey(), 'Garden.Users.Edit', array('class' => 'RemovePictureLink'));
	
	$SideMenu->AddLink('Options', T('Edit Preferences'), '/profile/preferences/'.$this->User->UserID.'/'.Gdn_Format::Url($this->User->Name), 'Garden.Users.Edit', array('class' => 'Popup PreferencesLink'));
 } else {
	 Add profile options for the profile owner
	if ($AllowImages)
	   $SideMenu->AddLink('Options', T('Change My Picture'), '/profile/picture', 'Garden.Profiles.Edit', array('class' => 'PictureLink'));