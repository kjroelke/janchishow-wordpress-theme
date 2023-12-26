import React from 'react';
import useGetData from '../hooks/useGetData';

export default function PostThumbnail( { post } ) {
	const { data: src, isLoading } = useGetData(
		post[ '_links' ][ 'wp:featuredmedia' ][ 0 ]?.href
	);
	if ( isLoading ) {
		return (
			<img
				src=""
				alt=""
				className="placeholder card-img-top object-fit-cover img-fluid"
				height="375"
			/>
		);
	} else {
		return (
			src && (
				<img
					src={ src.source_url }
					alt=""
					className="card-img-top object-fit-cover img-fluid"
				/>
			)
		);
	}
}
