import React, { useState } from 'react';

const Profile = ({ profiles }) => {
    profiles.map((profile) => {
        return (
            <div className="text-center">
                <img className="d-block mx-auto" src={`/image/${pro.profile_image_path}`} width="100px" />
                <p>{profile.name}</p>
                <p>{profile.favorite}</p>
                <p>{profile.free_writing}</p>
            </div>
        )
    })
}

export default Profile;